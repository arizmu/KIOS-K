import "./echo";
import "flyonui/flyonui";
import Alpine from "alpinejs";
import axios from "axios";
import alpineModules from "./modules";
window.Alpine = Alpine;
window.axios = axios;
alpineModules(Alpine);
Alpine.start();
