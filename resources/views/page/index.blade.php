@extends('layouts.app') @section('content')
<section class="pt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <a class="h4 text-primary" href="{{route('page.about.edit',[],false)}}">大賽簡介</a>
            </div>
            <div class="col-auto">
                <a class="h4 text-primary" href="{{route('page.award.edit',[],false)}}">得獎者獎項</a>
            </div>
            <div class="col-auto">
                <a class="h4 text-primary" href="{{route('page.competitionReview.edit',[],false)}}">競賽評審</a>
            </div>
            <div class="col-auto">
                <a class="h4 text-primary" href="{{route('page.entryRequirement.edit',[],false)}}">參賽要求</a>
            </div>
            <div class="col-auto">
                <a class="h4 text-primary" href="{{route('page.relatedStatement.edit',[],false)}}">相關聲明</a>
            </div>
            <div class="col-auto">
                <a class="h4 text-primary" href="{{route('page.reviewAndAwards.edit',[],false)}}">評審及評獎</a>
            </div>
            <div class="col-auto">
                <a class="h4 text-primary" href="{{route('page.workRequirement.edit',[],false)}}">作品要求</a>
            </div>
        </div>
    </div>
</section>
@endsection