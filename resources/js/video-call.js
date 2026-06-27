import { ZegoUIKitPrebuilt } from "@zegocloud/zego-uikit-prebuilt";

const { appID, roomID, userID, userName } = window.ZEGO_CONFIG;

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
        onLeaveRoom: async () => {
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

            const role = window.ZEGO_CONFIG.userRole || "student";
            window.location.href =
                role === "mentor" ? "/dashboard/mentor" : "/dashboard/student";
        },
    });
}

document.addEventListener("DOMContentLoaded", () => {
    if (document.getElementById("zego-container")) {
        startCall();
    }
});
