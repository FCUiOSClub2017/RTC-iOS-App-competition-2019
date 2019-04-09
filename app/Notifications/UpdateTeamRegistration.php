<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateTeamRegistration extends Notification implements ShouldQueue
{
    use Queueable;
    private $oldEmail;
    private $newEmail;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($oldEmail, $newEmail)
    {
        $this->oldEmail = $oldEmail;
        $this->newEmail = $newEmail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject('2019 APP移動應用創新賽 資料更動')
            ->greeting('親愛的參賽者您好：')
            ->line("隊長已將您的電子郵件($this->oldEmail)更改至此電子郵件($this->newEmail)，貼心提醒您競賽日程相關如下，並預祝您贏得佳績！")
            ->line('1.  線上報名（2019年04月01日〜5月15日），參賽隊伍皆須通過大賽網站報名註冊，同時須完整填寫報名資料。')
            ->line('2.  企劃書（2019年5月1日〜6月10日繳交附件一）請以A4版面書寫5至10頁以內，另作封面註明隊伍名稱與作品名稱，檔案格式請存成 PDF 檔，檔案名稱須同【聯絡人學校_聯絡人系級_聯絡人姓名_參賽APP名稱_企劃書】，檔案大小請避免超過10MB。')
            ->line('3.  初選結果公佈：2019年6月14日前公佈20隊進入決賽作品。')
            ->line('4.  決賽繳交（2019年6月15日～6月30日繳交）：進入決賽隊伍，須提交參賽隊伍所在學校系所用印後的報名表，如附件二，文件需整併成一個PDF檔，檔案名稱須同【聯絡人學校_聯絡人系級_聯絡人姓名_參賽APP名稱】。若有成員未滿二十歲者，需再繳交「法定代理人同意書」，任一人未於時間內繳交者，則取消該隊決賽資格，由下一順序之參賽隊伍遞補。')
            ->line('5.  APP作品（2019年6月15日～7月26日繳交）：')
            ->line('    I.    操作影片：請依照企劃書內容撰寫出適用可攜式移動裝置之 APP ，操作過程需拍攝成影片，影片長度180秒，限MP4格式，解析度1280*720 dpi 以上，須上傳至 YouTube 設定為公開播放，並將影片播放網址填至現場簡報檔中；視頻內容必須與APP應用相關，任何含暴力、色情等的內容均將被駁回。')
            ->line('    II.   現場簡報檔，提報時間以8分鐘為限。')
            ->line('    III.  SOURCE CODE 文字檔案。')
            ->line('    IV.   APP宣傳資料(如附件三)。')
            ->line('    V.    以上(1)~(4)資料，請存成一個資料夾，並將資料夾壓縮成.zip檔，檔案名稱須同【聯絡人學校_聯絡人系級_聯絡人姓名_參賽APP名稱_APP作品】。')
            ->line('6.  決賽現場：2019年8月6日於逢甲大學進行決賽，現場展演、答辯及評選，現場必須使用Apple硬體為載具進行展演，設備需自行攜帶。')
            ->line('7.  總決賽選手集訓營：2019 年 8月中下旬，於浙江大學舉辦。')
            ->line('8.  大中華區總決賽：2019 年 9 月，於浙江大學舉辦。')
            ->line('聯繫方式')
            ->line('比賽網站：https://rtc-2019.fcu.edu.tw')
            ->line('聯繫信箱：stacse@straighta.com.tw')
            ->line('聯繫地址：台中市西屯區文華路100號')
            ->line('逢甲大學 Apple RTC 區域教育培訓中心')
            ->line('聯繫電話：Straight A客服專線（02）6608-1000')
            ->line('感謝您參與!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    /**
     * Get the tags that should be assigned to the job.
     *
     * @return array
     */
    public function tags()
    {
        return ['UpdateTeamRegistration'];
    }
}
