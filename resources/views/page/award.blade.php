@extends('layouts.app') @section('content')
<section class="award" id="award">
    <div class="container text-center px-3 px-md-4 px-lg-5">
        <h2 class="display-4 mb-3">得獎者獎項</h2>
        <table class="table table-bordered align-middle">
            <thead>
                <tr class="bg-primary text-white">
                    <th>名次</th>
                    <th>隊數</th>
                    <th>獎品</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">特獎</td>
                    <td class="align-middle">1隊</td>
                    <td class="align-middle">MacBook Pro 13吋 128GB
                        <br/>價值 $41,900 乙台
                        <br/>指導老師獎金 NT$20,000</td>
                </tr>
                <tr>
                    <td class="align-middle">一獎</td>
                    <td class="align-middle">1隊</td>
                    <td class="align-middle">iPhone X 64GB 價值 NT$35,900 乙台
                        <br/>指導老師獎金 NT$15,000</td>
                </tr>
                <tr>
                    <td class="align-middle">二獎</td>
                    <td class="align-middle">1隊</td>
                    <td class="align-middle">iPad Pro 10.5吋 64GB 價值 NT$20,900 乙台
                        <br/>指導老師獎金 NT$10,000</td>
                </tr>
                <tr>
                    <td class="align-middle">三獎</td>
                    <td class="align-middle">1隊</td>
                    <td class="align-middle">iPad 128GB 價值 NT$13,900乙台
                        <br/>指導老師獎金 NT$6,000</td>
                </tr>
                <tr>
                    <td class="align-middle">佳作</td>
                    <td class="align-middle">1隊</td>
                    <td class="align-middle">iPad 32GB 價值 NT$10,900 乙台
                        <br/>指導老師獎金 NT$3,000</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>@endsection