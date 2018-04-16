@extends('layouts.app') @section('content')
<section class="pt-3">
    <a href="{{route('page.about.edit',[],false)}}">大賽簡介</a>
    <a href="{{route('page.award.edit',[],false)}}">得獎者獎項</a>
    <a href="{{route('page.competitionReview.edit',[],false)}}">競賽評審</a>
    <a href="{{route('page.entryRequirement.edit',[],false)}}">參賽要求</a>
    <a href="{{route('page.relatedStatement.edit',[],false)}}">相關聲明</a>
    <a href="{{route('page.reviewAndAwards.edit',[],false)}}">評審及評獎</a>
    <a href="{{route('page.workRequirement.edit',[],false)}}">作品要求</a>
</section>
@endsection