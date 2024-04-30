import { GUI } from "three/addons/libs/lil-gui.module.min.js";
import { World } from "./world";

/**
 *
 * @param {World} world
 */
export function setupUI(world, player, physics) {
  const gui = new GUI();

  const playerFolder = gui.addFolder("Player");
  playerFolder.add(player, "maxSpeed", 1, 20, 0.1).name("Max Speed");
  playerFolder.add(player, "jumpSpeed", 1, 10, 0.1).name("Jump Speed");
  playerFolder.add(player.boundsHelper, "visible").name("Show Player Bounds");
  playerFolder.add(player.cameraHelper, "visible").name("Show Camera Helper");

  const physicsFolder = gui.addFolder("Physics");
  physicsFolder.add(physics.helpers, "visible").name("Visualize Collisions");
  physicsFolder.add(physics, "simulationRate", 10, 1000).name("Sim Rate");

  const worldFolder = gui.addFolder("World");
  worldFolder.add(world.size, "width", 8, 128, 1).name("Width");
  worldFolder.add(world.size, "height", 8, 32, 1).name("Height");

  const terrainFolder = worldFolder.addFolder("Terrain");
  terrainFolder.add(world.params, "seed", 0, 10000, 1).name("Seed");
  terrainFolder.add(world.params.terrain, "scale", 10, 100).name("Scale");
  terrainFolder.add(world.params.terrain, "magnitude", 0, 1).name("Magnitude");
  terrainFolder.add(world.params.terrain, "offset", 0, 1).name("Offset");

  terrainFolder.onChange((event) => {
    world.generate();
  });
}
