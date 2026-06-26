import { httpGet, httpPost } from "./http-asset.js";
const PROFILE_CACHE_KEY = "user_profile";
const CACHE_EXPIRY_MS = 5 * 60 * 1000;
const getProfile = async () => {
    const cached = localStorage.getItem(PROFILE_CACHE_KEY);
    if (cached) {
        try {
            const parsed = JSON.parse(cached);
            if (
                parsed.timestamp &&
                Date.now() - parsed.timestamp < CACHE_EXPIRY_MS
            ) {
                return parsed.data;
            } else {
                console.log("⏳ Cache sudah expired, akan mengambil ulang");
                localStorage.removeItem(PROFILE_CACHE_KEY);
            }
        } catch (e) {
            localStorage.removeItem(PROFILE_CACHE_KEY);
        }
    }

    try {
        const profileData = await httpGet("/profile");
        const cacheData = {
            data: profileData,
            timestamp: Date.now(),
        };
        localStorage.setItem(PROFILE_CACHE_KEY, JSON.stringify(cacheData));
        return profileData;
    } catch (error) {
        console.error("Gagal mengambil profil:", error);
        throw error;
    }
};

const userLogout = async () => {
    try {
        const logout = await httpPost("/logout", {});
        localStorage.removeItem(PROFILE_CACHE_KEY);
        return logout;
    } catch (error) {
        console.error("Gagal logout:", error);
        throw error;
    }
}

export { getProfile };
