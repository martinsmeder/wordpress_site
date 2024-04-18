import * as THREE from "three";
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader.js"; // Import GLTFLoader from Three.js examples
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls.js"; // Import OrbitControls from Three.js examples

// Folder structure for 3D model
// public/
//  |- scene.gltf
//  |- scene.bin
//  |- textures/
//       |- texture1.jpg
//       |- texture2.jpg
//       |- ...

// Create a new Three.js scene
const scene = new THREE.Scene();

// Set the background color of the scene to white
scene.background = new THREE.Color(0xdddddd);

// Create a new perspective camera
const camera = new THREE.PerspectiveCamera(
  40,
  window.innerWidth / window.innerHeight,
  1,
  5000
);

// Set the initial position of the camera
camera.position.set(0, 0, 10);

// Create a new WebGL renderer
const renderer = new THREE.WebGLRenderer();

// Set the size of the renderer to match the window size
renderer.setSize(window.innerWidth, window.innerHeight);

// Append the renderer's DOM element to the document body
document.body.appendChild(renderer.domElement);

// Create a new OrbitControls instance to control the camera's position
const controls = new OrbitControls(camera, renderer.domElement);

// Create an ambient light to illuminate the 3d model
const light = new THREE.AmbientLight(0x404040, 100);

// Add the light to the scene
scene.add(light);

// Create a new GLTFLoader instance to load GLTF models
const loader = new GLTFLoader();

// Load the GLTF model named "scene.gltf"
loader.load(
  "scene.gltf",
  function (gltf) {
    // Add the loaded GLTF scene to the Three.js scene
    scene.add(gltf.scene);
    // Start the animation loop
    animate();
  },
  undefined,
  function (error) {
    console.error(error);
  }
);

// Animation loop function
function animate() {
  // Request the next animation frame
  requestAnimationFrame(animate);
  // Render the scene using the camera
  renderer.render(scene, camera);
  // Update the controls
  controls.update();
}
