@props(['fishfoods'])
<x-layout>
    <div class="container my-3">
      <div class="card" style="border:none;">
      <div class="row">
        <div class="col-md-4">
          <img src="/img/fishfood.jpg" alt="" class="img-fluid rounded" style="height:300px;">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <div class="card-title fw-bold">ငါးစာများ</div>
              <p class="card-text">မွေးမြူရေးလုပ်ငန်းရှင်များသည်စိန်ခေါ်မှုအပြည့်ရှိနေတဲ့ပတ်ဝန်းကျင်အနေအထားများမှာလုပ်ငန်းလုပ်ကိုင်လျက်ရှိနေကြပါသည်။
                တစ်ဖက်တွင်ထုတ်လုပ်မှုကုန်ကျစရိတ်ကိုလျှော့ချရန်အထူးပင်လိုအပ်လျက်ရှိနေပါသည်။ 
                အခြားတစ်ဖက်တွင်လည်းစားသုံးသူများအနေဖြင့် ဘေးအန္တရာယ်ကင်းရှင်းသော၊သန့်ရှင်းလတ်ဆတ်သော၊အရည်အသွေးမြင့်အသားများကိုရရှိရန်တောင်းဆိုမှုများလည်းမြင့်တက်လာလျက်ရှိနေပါသည်။
                မွေးမြူရေးသမားတစ်ဦးချင်းစီအတွက်အသင့်တော်ဆုံးဖြစ်စေမည့်အထူးထုတ်အစာများနှင့်စီမံခန့်ခွဲမှုဆိုင်ရာနည်းလမ်းများကိုထောက်ပံ့ပေးပြီး<br/>မြန်မာ့မွေးမြူရေးသမားအတွက်ပိုမိုကောင်းမွန်သောအကျိုးရလဒ်များကိုရရှိစေရန်
                ကျွန်ုပ်တို့မှကူညီဆောင်ရွက်ပေးလျက်ရှိနေပါသည်။မိတ်ဆွေတို့မွေးမြူထားသော ငါး၏ကြီးထွားမှုအဆင့်များနှင့်သင့်လျော်သည့် အာဟာရဗေဒဆိုင်ရာဖြေရှင်းချက်များဖြင့်ကူညီထောက်ပံ့ပေးနေပါသည်။
  
              </p>
              
          </div>
        </div>
      </div>
      </div>
    </div>
            {{-- company dropdown --}}
  <div class="dropdown mb-2 mt-2 text-center">  
    <h5 class="py-2 fw-bold">မွေးမြူရေးအစာကုမ္ပဏီများအားရွေးချယ်ရန်</h5>
    <button class="btn bg-info-subtle dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      {{isset($currentCompany) ? $currentCompany->name : 'အမျိုးအစားများ'}}
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="/fish_foods">အားလုံး</a></li>
  @foreach ($companies as $company)
  <li><a class="dropdown-item" href="/fish_foods/?company={{$company->slug}}{{request('search')?'&search='.request('search') : ''}}">{{$company->name}}</a></li>
  @endforeach
    </ul>
  </div> 
     {{-- code number search  and company dropdown hidden--}} 
<section class="container">
  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-8 col-lg-6">
  <form action="" class="">
    <div class="input-group my-4">
      @if(request('company'))
        <input name="company" type="hidden" value="{{request('company')}}" />
      @endif              
        <input type="text" name="search" value="{{request('search')}}" class="form-control" autocomplete="false" placeholder="search by code..." aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-search-heart"></i></button>
    </div>      
  </form>
</div>
</div>
            <div class="row text-center">
                @forelse ($fishfoods as $fishfood)
                    <div class="col-md-4 mb-4">
                      <div class="card m-5 rounded-pill text-center overflow-hidden" style="width:18rem;border:none;">
                        <img src="/storage/{{$fishfood->image}}" class="card-img-top" alt="..." >
                        <div class="card-body">
                          <h5 class="card-title">{{$fishfood->code}}</h5>   
                          <div class="tags mb-2">
                            <a href="/fish_foods/?company={{$fishfood->company->slug}}"><span class="badge text-bg-dark">{{$fishfood->company->name}}</span></a>
                      </div>
                          <p class="card-text text-muted">{{$fishfood->price}} ကျပ်</p>
                          <a href="/fish_foods/{{$fishfood->id}}" class="btn btn-primary rounded-pill">ပိုမိုလေ့လာမည်</a>
                        </div>
                      </div>
                    </div>
                    @empty
                    <p class="text-center">No fish livestock food found.</p>
                    @endforelse
                    {{$fishfoods->links()}}
            </div>
    </section>
    </x-layout>