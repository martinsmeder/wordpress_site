import * as THREE from "three";
import { PointerLockControls } from "three/addons/controls/PointerLockControls.js";

export class Player {
  camera = new THREE.PerspectiveCamera(
    70,
    window.innerWidth / window.innerHeight,
    0.1,
    100
  );
  cameraHelper = new THREE.CameraHelper(this.camera);
  controls = new PointerLockControls(this.camera, document.body);

  height = 1.75;
  radius = 0.5;
  maxSpeed = 5;
  jumpSpeed = 10;
  onGround = false;
  velocity = new THREE.Vector3();
  #worldVelocity = new THREE.Vector3();
  input = new THREE.Vector3();

  weapon = {
    // Group that will contain the weapon mesh
    container: new THREE.Group(),
    // Whether or not the weapon is currently animating
    animate: false,
    // The time the animation was started
    animationStart: 0,
    // The rotation speed of the weapon
    animationSpeed: 0.025,
    // Reference to the current animation
    animation: null,
  };

  constructor(scene) {
    this.position.set(32, 40, 32);
    this.cameraHelper.visible = true;
    scene.add(this.camera);
    scene.add(this.cameraHelper);

    // The weapon is parented to the camera
    this.camera.add(this.weapon.container);

    // Wireframe mesh visualizing the player's bounding cylinder
    this.boundsHelper = new THREE.Mesh(
      new THREE.CylinderGeometry(this.radius, this.radius, this.height, 16),
      new THREE.MeshBasicMaterial({ wireframe: true })
    );
    this.boundsHelper.visible = true;
    scene.add(this.boundsHelper);

    // Add event listeners for keyboard/mouse events
    document.addEventListener("keyup", this.onKeyUp.bind(this));
    document.addEventListener("keydown", this.onKeyDown.bind(this));
    document.addEventListener("mousedown", this.onMouseDown.bind(this));
  }

  /**
   * Updates the state of the player
   * @param {World} world
   */
  update() {
    this.updateBoundsHelper();

    if (this.weapon.animate) {
      this.updateWeaponAnimation();
    }
  }

  /**
   * Updates the state of the player based on the current user inputs
   * @param {Number} dt
   */
  applyInputs(dt) {
    if (this.controls.isLocked === true) {
      this.velocity.x = this.input.x;
      this.velocity.z = this.input.z;
      this.controls.moveRight(this.velocity.x * dt);
      this.controls.moveForward(this.velocity.z * dt);
      this.position.y += this.velocity.y * dt;
    }

    document.getElementById("info-player-position").innerHTML = this.toString();
  }

  /**
   * Updates the position of the player's bounding cylinder helper
   */
  updateBoundsHelper() {
    this.boundsHelper.position.copy(this.camera.position);
    this.boundsHelper.position.y -= this.height / 2;
  }

  /**
   * Set the weapon object the player is holding
   * @param {THREE.Mesh} weapon
   */
  setWeapon(weapon) {
    this.weapon.container.clear();
    this.weapon.container.add(weapon);
    this.weapon.container.receiveShadow = true;
    this.weapon.container.castShadow = true;

    this.weapon.container.position.set(0.18, -0.02, -0.5);
    this.weapon.container.scale.set(0.01, 0.01, 0.01);
    this.weapon.container.rotation.x = 2.2;
    this.weapon.container.rotation.y = -0.1;
    this.weapon.container.rotation.z = -1.5;
  }

  /**
   * Animates the weapon rotation
   */
  updateWeaponAnimation() {
    if (this.weapon.container.children.length > 0) {
      const t =
        this.weapon.animationSpeed *
        (performance.now() - this.weapon.animationStart);
      this.weapon.container.children[0].rotation.y = 0.5 * Math.sin(t);
    }
  }

  /**
   * Returns the current world position of the player
   * @returns {THREE.Vector3}
   */
  get position() {
    return this.camera.position;
  }

  /**
   * Returns the velocity of the player in world coordinates
   * @returns {THREE.Vector3}
   */
  get worldVelocity() {
    this.#worldVelocity.copy(this.velocity);
    this.#worldVelocity.applyEuler(
      new THREE.Euler(0, this.camera.rotation.y, 0)
    );
    return this.#worldVelocity;
  }

  /**
   * Applies a change in velocity 'dv' that is specified in the world frame
   * @param {THREE.Vector3} dv
   */
  applyWorldDeltaVelocity(dv) {
    dv.applyEuler(new THREE.Euler(0, -this.camera.rotation.y, 0));
    this.velocity.add(dv);
  }

  /**
   * Event handler for 'keyup' event
   * @param {KeyboardEvent} event
   */
  onKeyUp(event) {
    switch (event.code) {
      case "Escape":
        if (event.repeat) break;
        if (this.controls.isLocked) {
          console.log("unlocking controls");
          this.controls.unlock();
        } else {
          console.log("locking controls");
          this.controls.lock();
        }
        break;
      case "KeyW":
        this.input.z = 0;
        break;
      case "KeyA":
        this.input.x = 0;
        break;
      case "KeyS":
        this.input.z = 0;
        break;
      case "KeyD":
        this.input.x = 0;
        break;
    }
  }

  /**
   * Event handler for 'keyup' event
   * @param {KeyboardEvent} event
   */
  onKeyDown(event) {
    switch (event.code) {
      case "KeyW":
        this.input.z = this.maxSpeed;
        break;
      case "KeyA":
        this.input.x = -this.maxSpeed;
        break;
      case "KeyS":
        this.input.z = -this.maxSpeed;
        break;
      case "KeyD":
        this.input.x = this.maxSpeed;
        break;
      case "KeyR":
        if (this.repeat) break;
        this.position.set(32, 10, 32);
        this.velocity.set(0, 0, 0);
        break;
      case "Space":
        if (this.onGround) {
          this.velocity.y += this.jumpSpeed;
        }
        break;
    }
  }

  /**
   * Event handler for 'mousedown'' event
   * @param {MouseEvent} event
   */
  onMouseDown(event) {
    if (this.controls.isLocked) {
      // If the weapon isn't currently animating, trigger the animation
      if (!this.weapon.animate) {
        this.weapon.animate = true;
        this.weapon.animationStart = performance.now();

        // Clear the existing timeout so it doesn't cancel our new animation
        clearTimeout(this.weapon.animation);

        // Stop the animation after 1.5 cycles
        this.weapon.animation = setTimeout(() => {
          this.weapon.animate = false;
        }, (3 * Math.PI) / this.weapon.animationSpeed);
      }
    }
  }

  /**
   * Returns player position in a readable string form
   * @returns {string}
   */
  toString() {
    let str = "";
    str += `X: ${this.position.x.toFixed(3)} `;
    str += `Y: ${this.position.y.toFixed(3)} `;
    str += `Z: ${this.position.z.toFixed(3)}`;
    return str;
  }
}
