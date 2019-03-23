<section class="timeline" id="timeline">
  <div class="container-fluid text-center px-xl-5">
    <h2 class="display-4 mb-5">競賽日程</h2>
  </div>
  <div class="container-fulid text-center px-xl-5">
    <div class="no-gutters row stats-row justify-content-around justify-content-xl-around">
      <div class="stats-col text-center col-8 col-sm-5 col-md-3 col-xl-2">
        <div class="ratio-1-1">
          <div class="circle">
            <span class="stats-no" style="background-color: hsl(314, 66%, 59%)"><a>{{Carbon::parse(Setting::get('register_deadline', '2019-5-15'), 'Asia/Taipei')->month}}/{{Carbon::parse(Setting::get('register_deadline', '2019-5-15'), 'Asia/Taipei')->day}}</a></span>
            <div class="circle-overflow" data-toggle="modal-hide" data-target="#date5-15">
              <div class="circle-content">
                <a>報名截止</a>
              </div>
              <div class="circle-overlay">
                <a>參賽隊伍皆須在4⽉01⽇～5⽉15⽇通過大賽網站報名註冊，同時須完整填寫報名資料。至多三名學生以及二名指導老師</a>

                {{--
                <a>4⽉01⽇～5⽉15⽇填寫報名資料</a> 
                --}}

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="stats-col text-center col-8 col-sm-5 col-md-3 col-xl-2">
        <div class="ratio-1-1">
          <div class="circle">
            <span class="stats-no" style="background-color: hsl(314, 66%, 59%)"><a>{{Carbon::parse(Setting::get('proposal_deadline', '2018-6-10'), 'Asia/Taipei')->month}}/{{Carbon::parse(Setting::get('proposal_deadline', '2018-6-10'), 'Asia/Taipei')->day}}</a></span>
            <div class="circle-overflow" data-toggle="modal-hide" data-target="#date5-23">
              <div class="circle-content">
                <a>計劃書
                  <br/>繳交截止</a>
              </div>
              <div class="circle-overlay">
                <a><br>請在6⽉10⽇前以A4版面書寫5至10頁，另作封面註明隊伍名稱與作品名稱，檔案格式存成 PDF 檔，檔案名稱須同【聯絡人學校_聯絡人系級_聯絡人姓名_APP名稱_企劃書】</a>
                <a href="/doc/2019年APP移動應用創新賽附件1~3.pdf" style=" top:90%;color:aqua;" onclick="event.preventDefault();window.open('/doc/2019年APP移動應用創新賽附件1~3.pdf', '_blank');">附件</a>

                {{--
                <a>5⽉1⽇～6⽉10⽇參賽作品交件</a> 
                --}}

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-100 d-none d-sm-block d-md-none"></div>
      <div class="stats-col text-center col-8 col-sm-5 col-md-3 col-xl-2">
        <div class="ratio-1-1">
          <div class="circle">
            <span class="stats-no" style="background-color: hsl(314, 66%, 59%)"><a>6/14</a></span>
            <div class="circle-overflow" data-toggle="modal-hide" data-target="#date6-15">
              <div class="circle-content">
                <a>初賽結果公布</a>
              </div>
              <div class="circle-overlay">
                <a>獲選進入決賽之隊伍，&nbsp &nbsp<br>需於 {{Carbon::parse(Setting::get('register_form_deadline', '2018-06-30'), 'Asia/Taipei')->month}}/{{Carbon::parse(Setting::get('register_form_deadline', '2018-06-30'), 'Asia/Taipei')->day}} 前繳交報名表&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<br>如附件二，文件需整併成一個PDF檔,檔名稱須同【聯絡人學校_聯絡 人系級_聯絡人姓名_參賽APP名稱】, 未滿二十歲者，需再繳交「法定代理人同意書」，任一人未繳交則取消該隊決賽資格，由下一順序之參賽隊伍遞補。。</a>
                <a href="/doc/2019年APP移動應用創新賽附件1~3.pdf" style=" top:90%;color:aqua;" onclick="event.preventDefault();window.open('/doc/2019年APP移動應用創新賽附件1~3.pdf', '_blank');">附件</a>
                {{--
                <a>獲選進入決賽之隊伍，必須在一周內提供每位成員的在學證明以及指導老師的教師資格證明</a> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-100 d-none d-sm-block d-xl-none"></div>
      <div class="col-1 d-none d-md-block d-xl-none"></div>
      <div class="stats-col text-center col-8 col-sm-5 col-md-3 col-xl-2">
        <div class="ratio-1-1">
          <div class="circle">
            <span class="stats-no" style="background-color: hsl(314, 66%, 59%)"><a>{{Carbon::parse(Setting::get('app_upload_deadline', '2018-07-26'), 'Asia/Taipei')->month}}/{{Carbon::parse(Setting::get('app_upload_deadline', '2018-07-26'), 'Asia/Taipei')->day}}</a></span>
            <div class="circle-overflow" data-toggle="modal-hide" data-target="#date7-04">
              <div class="circle-content">
                <a>APP 作品
                  <br>繳交截止</a>
              </div>
              <div class="circle-overlay">
                <a>提交決賽現場的提案&nbsp &nbsp &nbsp<br>簡報檔、SOURCE CODE、&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<br>APP宣傳資料(附件三)，以及APP操作過程影片檔180秒,MP4格式,需上傳Youtube並把網站填入簡報中，請存成一個資料夾,並壓縮成.zip檔，檔案名稱須同【聯絡人學校_聯絡人系級_聯絡人姓名_參賽APP名稱_APP作品】。</a>
                <a href="/doc/2019年APP移動應用創新賽附件1~3.pdf" style=" top:90%;color:aqua;" onclick="event.preventDefault();window.open('/doc/2019年APP移動應用創新賽附件1~3.pdf', '_blank');">附件</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="stats-col text-center col-8 col-sm-5 col-md-3 col-xl-2">
        <div class="ratio-1-1">
          <div class="circle">
            <span class="stats-no" style="background-color: hsl(314, 66%, 59%)"><a>8/06</a></span>
            <div class="circle-overflow" data-toggle="modal-hide" data-target="#date8-02">
              <div class="circle-content">
                <a>決賽現場</a>
              </div>
              <div class="circle-overlay">
                <a>8月6日於逢甲大學進行決賽，現場展演、答辯及評選，現場必須使用Apple硬體為載具進行展演，設備需自行攜帶。</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-1 d-none d-md-block d-xl-none"></div>
    </div>
  </div>
</section>