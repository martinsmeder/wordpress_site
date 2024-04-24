import { GUI } from "three/addons/libs/lil-gui.module.min.js";

/**
 * Sets up the UI controls
 * @param {Player} player
 */
export function setupUI(player) {
  const gui = new GUI();

  const playerFolder = gui.addFolder("Player");
  playerFolder.add(player, "maxSpeed", 1, 20, 0.1).name("Max Speed");
  playerFolder.add(player.cameraHelper, "visible").name("Show Camera Helper");

  document.addEventListener("keydown", (event) => {
    console.log(event);
    if (event.code === "KeyU") {
      console.log(gui._hidden);
      if (gui._hidden) {
        gui.show();
      } else {
        gui.hide();
      }
    }
  });
}
