import fs from 'fs-extra';

async function moveManifest() {
  try {
    await fs.move('public/build/.vite/manifest.json', 'public/build/manifest.json', { overwrite: true });
    console.log('Manifest file moved successfully!');
  } catch (error) {
    console.error('Error moving manifest file:', error);
  }
}

moveManifest();
