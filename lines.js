import * as THREE from "three";

// Create a WebGLRenderer instance and set its size to match the window dimensions
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);

// Append the renderer's DOM element to the document body
document.body.appendChild(renderer.domElement);

// Create a PerspectiveCamera with specified field of view, aspect ratio, near and far clipping plane
const camera = new THREE.PerspectiveCamera(
  45,
  window.innerWidth / window.innerHeight,
  1,
  500
);

// Set the initial position of the camera
camera.position.set(0, 0, 100);

// Point the camera at the center of the scene
camera.lookAt(0, 0, 0);

// Create a new scene
const scene = new THREE.Scene();

// Create a LineBasicMaterial with blue color
const material = new THREE.LineBasicMaterial({ color: 0x0000ff });

// Define the points for the line geometry
const points = [];
points.push(new THREE.Vector3(-10, 0, 0));
points.push(new THREE.Vector3(0, 10, 0));
points.push(new THREE.Vector3(10, 0, 0));

// Create a BufferGeometry and set its points
const geometry = new THREE.BufferGeometry().setFromPoints(points);

// Create a Line object with the geometry and material
const line = new THREE.Line(geometry, material);

// Add the line to the scene
scene.add(line);

// Render the scene with the camera
renderer.render(scene, camera);
