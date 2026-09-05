import { ZegoUIKitPrebuilt } from "@zegocloud/zego-uikit-prebuilt";
import { initAudioDetection, stopAudioDetection } from "./audio-detection.js";

const { appID, roomID, userID, userName, userRole } = window.ZEGO_CONFIG;

async function startCall() {
    const response = await fetch("/zego/token");
    const data = await response.json();
    const serverSecret = data.serverSecret;

    const kitToken = ZegoUIKitPrebuilt.generateKitTokenForTest(
        Number(appID),
        serverSecret,
        roomID,
        String(userID),
        userName,
    );

    const zc = ZegoUIKitPrebuilt.create(kitToken);

    zc.joinRoom({
        container: document.getElementById("zego-container"),
        scenario: {
            mode: ZegoUIKitPrebuilt.OneONoneCall,
            config: {
                role: ZegoUIKitPrebuilt.Host,
            },
        },
        showScreenSharingButton: true,
        showPreJoinView: true,
        onJoinRoom: () => {
            // Start audio detection once the user has joined the room
            initAudioDetection(roomID, Number(userID));
        },
        onLeaveRoom: async () => {
            // Stop audio detection immediately when leaving
            stopAudioDetection();

            // Mark session complete
            await fetch("/session/complete", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]',
                    ).content,
                },
                body: JSON.stringify({ room: window.ZEGO_CONFIG.roomID }),
            });

            if (userRole === "student") {
                // Show review modal for student
                document
                    .getElementById("reviewModal")
                    .classList.remove("hidden");
            } else {
                // Mentor goes straight to dashboard
                window.location.href = "/dashboard/mentor";
            }
        },
    });
}

document.addEventListener("DOMContentLoaded", () => {
    if (document.getElementById("zego-container")) {
        startCall();
    }
});
