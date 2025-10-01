import "./bootstrap";
import Alpine from "alpinejs";
import Calendar from "tui-calendar"; // TUI Calendar
import "tui-calendar/dist/tui-calendar.css";
window.Alpine = Alpine;
Alpine.start();
window.tui = { Calendar };
