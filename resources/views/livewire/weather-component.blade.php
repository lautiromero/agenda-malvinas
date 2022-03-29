@php
$data_length = count($data);    
@endphp
<div class="inline-flex items-end">
    <style>
    .swiper {
        width: 185px;
        height: 100%;
    }
    .swiper-slide {
        height: 100%;
    }
    </style>
    <div class="swiper inline-block">
        <div class="swiper-wrapper">
        @for ($i = 0; $i < $data_length; $i++)
        
            <div class="swiper-slide">
                <img class="inline object-cover w-7" src="http://openweathermap.org/img/wn/{{$data[$i]['icon']}}@2x.png" alt="">
                <span>{{$data[$i]['temp']}}° {{$data[$i]['name']}}</span> 
            </div>
         
        @endfor    
     </div>
    </div>
    @push('scripts')
    <script>
 
        window.onload = function(){

            var swiper = new Swiper('.swiper', {
                effect: "flip",
                flipEffect: {
                  slideShadows: false
                },
                autoplay: {
                    reverseDirection: false,
                    delay: 3500,
                    disableOnInteraction: false,
                },
                loop: true
            });
        }

    </script>
</div>




