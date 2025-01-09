<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>شكر دوري المناظرات</title>
</head>

<body style="direction: rtl;">
<div style="text-align: center !important;">
    <img src="{{ asset('images/public.png') }}" style="height: 200px !important; object-fit: cover !important;"  alt="">
</div>

<h1 style="text-align: right; margin-top: 0"> أهلا {{ $invitation->first_name }}  </h1>
<p style="text-align: center !important; font-size: 1rem !important;">شكرًا لحضوركم دوري مناظرات وزارة الرياضة</p>

<p style="text-align: center !important; font-size: 1rem !important;">نشكر لكم لحضوركم برنامج دوري مناظرات وزارة الرياضة.</p>


<div style="text-align: center !important;">
    <a style="display: inline-block;
    padding: 0.5rem 1rem;
    font-size: 1.25rem;
    font-weight: 400;
    line-height: 1.5;
    color: #fff;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    border: 1px solid #0d6efd;
    border-radius: 0.5rem;
    background-color: #0d6efd;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
" target="_blank" href="{{ $link }}">رابط الاستبيان</a>
</div>

</body>
</html>
