const staticAssets = [
    'index.html',
    'css/style.css',
    'css/reset.css',
    'css/swiper.min.css',
    'app.js',
    'jquery.js',
    'fallback.json',
    'manifest.json',
    'serviceWorker.js',
    'StickyNav.js',
    'swiper.min.js',
    'zoeker.js',
    'img/logo.ico',
    '../Content/BBCContent.php',
    '../Content/hlnContent.php',
    '../Content/destandaardContent.php',
    '../Content/DeTijdContent.php',
    '../Content/NYTContent.php',
    '../Content/pajotContent.php',
    '../contentLoader.php'
];

self.addEventListener('install', async event => {
    const cache = await caches.open('news-static');
    cache.addAll(staticAssets);
});

self.addEventListener('fetch', event=>{
    const req = event.request;
    const url = new URL(req.url);
    
    if(url.origin == location.origin){
        event.respondWith(cacheFirst(req));
    } else{
        event.respondWith(networkFirst(req));
    }
});

async function cacheFirst(req){
    const cachedResponse = await caches.match(req);
    return cachedResponse || fetch(req);
}

async function networkFirst(req){
    const cache = await caches.open('news-dynamic');

    try{
        const res = await fetch(req);
        cache.put(req, res.clone());
        return res;
    } catch (error) {
        const cachedResponse = await cache.match(req);
        return cachedResponse || await caches.match('fallback.json');
    }
}