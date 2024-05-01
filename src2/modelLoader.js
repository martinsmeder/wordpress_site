import { GLTFLoader } from "three/addons/loaders/GLTFLoader.js";

export class ModelLoader {
  loader = new GLTFLoader();

  models = {
    pickaxe: undefined,
  };

  constructor(onLoad) {
    this.loader.load("sword.glb", (model) => {
      const mesh = model.scene;
      this.models.pickaxe = mesh;
      onLoad(this.models);
    });
  }
}
