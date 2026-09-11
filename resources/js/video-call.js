import { ZegoUIKitPrebuilt } from "@zegocloud/zego-uikit-prebuilt";
import { initAudioDetection, stopAudioDetection, setAudioDetectionMuted } from "./audio-detection.js";

async function startCall() {
    const config = window.ZEGO_CONFIG || {};
    const { appID, roomID, sessionCode, userID, userName, userRole } = config;

    if (!appID || !roomID) {
        console.error("[AudioDetection] ZEGO_CONFIG is missing or invalid:", config);
        return;
    }
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
        onMicrophoneStateUpdate: (state) => {
            const isMuted = (state === 'MUTE' || state === false || state === 0);
            console.log("[AudioDetection] ZEGOCLOUD onMicrophoneStateUpdate:", state, "isMuted:", isMuted);
            setAudioDetectionMuted(isMuted);
        },
        onTurnOnMicrophoneDevice: (turnOn) => {
            const isMuted = !turnOn;
            console.log("[AudioDetection] ZEGOCLOUD onTurnOnMicrophoneDevice:", turnOn, "isMuted:", isMuted);
            setAudioDetectionMuted(isMuted);
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

    // Fallback listener for UI clicks on mute button inside container
    const zegoContainer = document.getElementById("zego-container");
    if (zegoContainer) {
        zegoContainer.addEventListener("click", () => {
            setTimeout(() => {
                if (typeof zc.isMicrophoneMuted === 'function') {
                    const muted = zc.isMicrophoneMuted();
                    console.log("[AudioDetection] Checked zc.isMicrophoneMuted():", muted);
                    setAudioDetectionMuted(muted);
                }
            }, 250);
        });
    }
}

document.addEventListener("DOMContentLoaded", () => {
    if (document.getElementById("zego-container")) {
        startCall();
    }
});
