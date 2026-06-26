import { httpPost, getCsrfToken, httpGet, httpGetWithParams } from "./assets/http-asset.js";
import { getProfile } from "./assets/profile-user.js";

export default function(Alpine) {
    Alpine.magic('httpPost', () => httpPost);
    Alpine.magic('httpGet', () => httpGet);
    Alpine.magic('httpGetWithParams', () => httpGetWithParams);
    Alpine.magic('getCsrfToken', () => getCsrfToken);
    Alpine.magic('getProfile', () => getProfile);
}