import * as THREE from "three";
import { OrbitControls } from "three/addons/controls/OrbitControls.js";
import Stats from "three/examples/jsm/libs/stats.module.js";
import { World } from "./world";
import { Player } from "./player";
import { setupUI } from "./ui";

const stats = new Stats();
document.body.append(stats.dom);

// Renderer setup
const renderer = new THREE.WebGLRenderer();
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(window.innerWidth, window.innerHeight);
renderer.setClearColor(0x80a0e0);
document.body.appendChild(renderer.domElement);

// Camera setup
const orbitCamera = new THREE.PerspectiveCamera(
  75,
  window.innerWidth / window.innerHeight,
  0.1,
  1000
);
orbitCamera.position.set(-20, 20, -20);

// Controls setup
const controls = new OrbitControls(orbitCamera, renderer.domElement);
controls.target.set(16, 16, 16);
controls.update(); // Update due to manual changes above

// Scene setup
const scene = new THREE.Scene();
const world = new World();
world.generate();
scene.add(world);

// Player
const player = new Player(scene);

function setupLights() {
  const light1 = new THREE.DirectionalLight();
  light1.position.set(1, 1, 1);
  scene.add(light1);

  const light2 = new THREE.DirectionalLight();
  light2.position.set(-1, 1, -0.5);
  scene.add(light2);

  const ambient = new THREE.AmbientLight();
  ambient.intensity = 0.1;
  scene.add(ambient);
}

// Render loop
let previousTime = performance.now();
function animate() {
  let currentTime = performance.now();
  let dt = (currentTime - previousTime) / 1000; // Delta time

  requestAnimationFrame(animate);
  player.applyInputs(dt);
  renderer.render(
    scene,
    player.controls.isLocked ? player.camera : orbitCamera
  );
  stats.update();

  previousTime = currentTime;
}

// Setup window resizing
window.addEventListener("resize", () => {
  orbitCamera.aspect = window.innerWidth / window.innerHeight;
  orbitCamera.updateProjectionMatrix();
  player.camera.aspect = window.innerWidth / window.innerHeight;
  player.camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight);
});

setupLights();
setupUI(world, player);
animate();
