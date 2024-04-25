import { GUI } from "three/addons/libs/lil-gui.module.min.js";
import { World } from "./world";

/**
 * Sets up the UI controls
 * @param {World} world
 * @param {Player} player
 */
export function setupUI(world, player) {
  const gui = new GUI();

  const worldFolder = gui.addFolder("World");
  worldFolder.add(world.size, "width", 8, 128, 1).name("Width");
  worldFolder.add(world.size, "height", 8, 32, 1).name("Height");

  const terrainFolder = worldFolder.addFolder("Terrain");
  terrainFolder.add(world.params, "seed", 0, 10000, 1).name("Seed");
  terrainFolder.add(world.params.terrain, "scale", 10, 100).name("Scale");
  terrainFolder.add(world.params.terrain, "magnitude", 0, 1).name("Magnitude");
  terrainFolder.add(world.params.terrain, "offset", 0, 1).name("Offset");

  gui.onChange(() => {
    world.generate();
  });

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
