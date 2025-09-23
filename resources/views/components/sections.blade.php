@isset($null)
    <section class="column  w-full justify-center grid-full y-auto x-auto">
       <?xml version="1.0" encoding="iso-8859-1"?>
<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
<svg height="100px" width="100px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 512 512" xml:space="preserve">
<path style="fill:#9ED368;" d="M0,256.006C0,397.402,114.606,512.004,255.996,512C397.394,512.004,512,397.402,512,256.006
	C512.009,114.61,397.394,0,255.996,0C114.606,0,0,114.614,0,256.006z"/>
<path style="fill:#8BC052;" d="M512,256.005c0.001-8.218-0.426-16.334-1.182-24.353c-0.306-0.367-85.884-85.972-86.313-86.313
	c-1.298-1.638-3.217-2.755-5.471-2.755H199.293c-3.918,0-7.089,3.173-7.089,7.089c0,2.252,1.117,4.172,2.754,5.47
	c0.34,0.429,0.707,0.797,1.137,1.137c0.34,0.429,0.709,0.798,1.138,1.138c0.34,0.43,82.604,82.693,83.034,83.034
	c0.34,0.429-124.692-123.126-125.122-123.467c-1.298-1.638-3.217-2.755-5.471-2.755H92.965c-3.918,0-7.089,3.173-7.089,7.089v56.707
	c0,2.253,1.117,4.173,2.754,5.471c0.34,0.429,0.708,0.798,1.137,1.137c0.34,0.429,42.593,42.733,42.909,43.011H92.964
	c-3.918,0-7.089,3.173-7.089,7.089v56.707c0,2.253,1.117,4.173,2.754,5.471c0.34,0.429,0.708,0.798,1.137,1.137
	c0.34,0.429,28.597,28.716,28.705,28.834H92.965c-3.918,0-7.089,3.173-7.089,7.088v56.707c0,2.253,1.117,4.173,2.754,5.471
	c0.34,0.429,0.708,0.798,1.137,1.137c0.34,0.429,106.491,106.58,106.919,106.919c0.316,0.399,0.666,0.737,1.057,1.057
	c18.721,4.357,38.202,6.736,58.251,6.735C397.394,512.004,512,397.401,512,256.005z"/>
<g>
	<path style="fill:#F4F6F9;" d="M149.673,114.23H92.965c-3.918,0-7.088,3.174-7.088,7.088v56.708c0,3.915,3.17,7.088,7.088,7.088
		h56.707c3.918,0,7.088-3.174,7.088-7.088v-56.707C156.762,117.405,153.591,114.23,149.673,114.23z M142.585,170.939h-42.531
		v-42.531h42.531V170.939z"/>
	<path style="fill:#F4F6F9;" d="M149.673,227.646H92.965c-3.918,0-7.088,3.174-7.088,7.088v56.707c0,3.915,3.17,7.088,7.088,7.088
		h56.707c3.918,0,7.088-3.173,7.088-7.088v-56.707C156.762,230.82,153.591,227.646,149.673,227.646z M142.585,284.354h-42.531
		v-42.531h42.531V284.354z"/>
	<path style="fill:#F4F6F9;" d="M149.673,326.884H92.965c-3.918,0-7.088,3.174-7.088,7.088v56.707c0,3.915,3.17,7.088,7.088,7.088
		h56.707c3.918,0,7.088-3.174,7.088-7.088v-56.706C156.762,330.059,153.591,326.884,149.673,326.884z M142.585,383.593h-42.531
		v-42.531h42.531V383.593z"/>
	<path style="fill:#F4F6F9;" d="M199.293,156.762h219.742c3.918,0,7.088-3.174,7.088-7.088c0-3.915-3.17-7.088-7.088-7.088H199.293
		c-3.918,0-7.088,3.174-7.088,7.088C192.204,153.587,195.374,156.762,199.293,156.762z"/>
	<path style="fill:#F4F6F9;" d="M419.035,248.912H199.293c-3.918,0-7.088,3.174-7.088,7.088c0,3.914,3.17,7.088,7.088,7.088h219.742
		c3.918,0,7.088-3.174,7.088-7.088C426.123,252.086,422.953,248.912,419.035,248.912z"/>
	<path style="fill:#F4F6F9;" d="M419.035,355.238H199.293c-3.918,0-7.088,3.173-7.088,7.088s3.17,7.088,7.088,7.088h219.742
		c3.918,0,7.088-3.174,7.088-7.088S422.953,355.238,419.035,355.238z"/>
</g>
</svg> <strong class="desc text-center no-select">{!! $text !!}</strong>
    </section>
@endisset
@isset($infinite_loading)
     <section data-url="{{ $url }}" class="grid-full infinite-loading row g-5 justify-center">
            <svg height="30" width="60" class="loader" viewBox="204 184 264 32"><style>@keyframes gooey {
            to {
                transform: translate3d(230px, 0, 0)
            }
        }

        .ellipse:nth-child(1) {
            animation: gooey 1s cubic-bezier(0.59, 0.8, 0.29, 0.1) infinite both alternate-reverse;
            animation-delay: 1s;
        }</style><defs><filter id="gooey" color-interpolation-filters="sRGB"><feGaussianBlur in="SourceGraphic" stdDeviation="7" result="blur"/><feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="gooey"/><feBlend in="SourceGraphic" in2="gooey"/></filter></defs><g class="ellipses" fill="blue" filter="url(#gooey)"><ellipse class="ellipse" cx="220" cy="200" rx="16" ry="16"/><ellipse class="ellipse" cx="280" cy="200" rx="16" ry="16"/><ellipse class="ellipse" cx="340" cy="200" rx="16" ry="16"/><ellipse class="ellipse" cx="400" cy="200" rx="16" ry="16"/></g></svg>

            <span class="c-blue">Fetching More Data....</span>
        </section>
@endisset
@isset($purchase_product)
      <div class="w-full p-10 column g-10">
        <strong class="desc c-green">Confirm Purchase</strong>
        <hr>
        <div class="row align-center space-between">
            <div class="row g-5 align-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M224,64H176V56a24,24,0,0,0-24-24H104A24,24,0,0,0,80,56v8H32A16,16,0,0,0,16,80V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V80A16,16,0,0,0,224,64ZM96,56a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96ZM224,80v32H192v-8a8,8,0,0,0-16,0v8H80v-8a8,8,0,0,0-16,0v8H32V80Zm0,112H32V128H64v8a8,8,0,0,0,16,0v-8h96v8a8,8,0,0,0,16,0v-8h32v64Z"></path></svg>
                <span>Product Name</span>
            </div>
            <span class="bold font-1 c-green">{{ $product->name }}</span>
        </div>
        <div class="row align-center space-between">
            <div class="row g-5 align-center">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-64-56a16,16,0,1,1-16-16A16,16,0,0,1,144,152Z"></path></svg>

                 <span>Daily Income</span>
            </div>
            <span class="bold font-1 c-green">&#8358; {{ number_format($product->daily_income,2)  }}</span>
        </div>
         <div class="row align-center space-between">
            <div class="row g-5 align-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M80,120h96a8,8,0,0,0,8-8V64a8,8,0,0,0-8-8H80a8,8,0,0,0-8,8v48A8,8,0,0,0,80,120Zm8-48h80v32H88ZM200,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V40A16,16,0,0,0,200,24Zm0,192H56V40H200ZM100,148a12,12,0,1,1-12-12A12,12,0,0,1,100,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,148Zm-80,40a12,12,0,1,1-12-12A12,12,0,0,1,100,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,188Z"></path></svg>

                 <span>Total Income</span>
            </div>
            <span class="bold font-1 c-green">&#8358; {{ number_format($product->daily_income*$product->cycle,2) }}</span>
        </div>
         <div class="row align-center space-between">
            <div class="row g-5 align-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>


                 <span>Expires After</span>
            </div>
            <span class="bold font-1 c-green">{{ number_format($product->cycle) }} Days</span>
        </div>
         <div class="row align-center space-between">
            <div class="row g-5 align-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M230.14,58.87A8,8,0,0,0,224,56H62.68L56.6,22.57A8,8,0,0,0,48.73,16H24a8,8,0,0,0,0,16h18L67.56,172.29a24,24,0,0,0,5.33,11.27,28,28,0,1,0,44.4,8.44h45.42A27.75,27.75,0,0,0,160,204a28,28,0,1,0,28-28H91.17a8,8,0,0,1-7.87-6.57L80.13,152h116a24,24,0,0,0,23.61-19.71l12.16-66.86A8,8,0,0,0,230.14,58.87ZM104,204a12,12,0,1,1-12-12A12,12,0,0,1,104,204Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,200,204Zm4-74.57A8,8,0,0,1,196.1,136H77.22L65.59,72H214.41Z"></path></svg>
                     

                 <span>Product Price</span>
            </div>
            <span class="bold font-1 c-green">&#8358;{{ number_format($product->price,2) }}</span>
        </div>
        <hr>
        <button onclick="GetRequest(event,'{{ url('users/get/purchase/product/confirm?id='.$product->id.'') }}',this,MyFunc.Confirmed)" class="btn-green-3d left-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#000000" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>

            Confirm Purchase</button>
    </div>

@endisset