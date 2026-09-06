import { ZegoUIKitPrebuilt } from "@zegocloud/zego-uikit-prebuilt";
import { initAudioDetection, stopAudioDetection } from "./audio-detection.js";

const { appID, roomID, sessionCode, userID, userName, userRole } = window.ZEGO_CONFIG;

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

    // Start audio detection immediately for this session
    console.log("[AudioDetection] Initialising audio detection for session:", sessionCode, "user:", userID);
    initAudioDetection(sessionCode, userID);

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
