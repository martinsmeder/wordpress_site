import * as THREE from "three";
import platform from "./platform";
import player from "./player";
import targetDummy from "./targetDummy";

// Create a scene
const scene = new THREE.Scene();

// Create a camera
const camera = new THREE.PerspectiveCamera(
  75,
  window.innerWidth / window.innerHeight,
  0.1,
  1000
);
camera.position.set(0, 5, 10); // Adjust camera position to view the platform

// Create a renderer
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

// Add objects to the scene
scene.add(platform);
scene.add(player);
scene.add(targetDummy);

// Create an ambient light to illuminate the scene
const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
scene.add(ambientLight);

// Create a directional light to add some highlights and shadows
const directionalLight = new THREE.DirectionalLight(0xffffff, 0.5);
directionalLight.position.set(10, 10, 10); // Adjust light position
scene.add(directionalLight);

// Define an animate function to update the scene and render it
function animate() {
  // Request the browser to call animate on the next repaint
  requestAnimationFrame(animate);

  // Render the scene with the camera
  renderer.render(scene, camera);
}

// Start the animation loop
animate();
