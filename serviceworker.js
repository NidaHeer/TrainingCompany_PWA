// Service worker script
const cacheName = 'stick-it-v1';
const filesToCache = [
  '/',
  '/index.php',
  '/manifest.json',
  '/img/icon-192x192.png',
  '/img/icon-512x512.png',
  '/css/styles.css',  // Add your styles and scripts here
  '/js/scripts.js'
];

// Install the service worker and cache files
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(cacheName)
      .then(cache => {
        return cache.addAll(filesToCache);
      })
  );
});

// Activate the service worker
self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.filter(name => name !== cacheName)
        .map(name => caches.delete(name))
      );
    })
  );
});

// Fetch from cache or network
self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        return response || fetch(event.request);
      })
  );
});
