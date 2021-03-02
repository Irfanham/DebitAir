@extends('layouts.app3', [ 'activePage' => 'laporan8', 'title' => __('Debit Air')])

@push('head')
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List href="Template%208.files/filelist.xml">
<style id="Blangko O_13496_Styles">
    <!--table
    {
        mso-displayed-decimal-separator: "\,";
        mso-displayed-thousand-separator: "\.";
    }

    .xl1513496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 11.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: general;
        vertical-align: bottom;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl6313496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 6.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: "Times New Roman", serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: general;
        vertical-align: middle;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl6413496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 6.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: "Times New Roman", serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: bottom;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl6513496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 6.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: "Times New Roman", serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: general;
        vertical-align: bottom;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl6613496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 6.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: "Times New Roman", serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: middle;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl6713496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 8.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: "Times New Roman", serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: left;
        vertical-align: middle;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl6813496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: general;
        vertical-align: bottom;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl6913496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: bottom;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl7013496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: left;
        vertical-align: bottom;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl7113496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: bottom;
        border: .5pt solid windowtext;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl7213496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: italic;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: general;
        vertical-align: bottom;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl7313496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: general;
        vertical-align: middle;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl7413496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: general;
        vertical-align: bottom;
        border-top: none;
        border-right: none;
        border-bottom: .5pt solid windowtext;
        border-left: none;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl7513496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: middle;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl7613496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: left;
        vertical-align: middle;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl7713496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 11.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: bottom;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl7813496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: bottom;
        border-top: none;
        border-right: .5pt solid windowtext;
        border-bottom: .5pt solid windowtext;
        border-left: .5pt solid windowtext;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl7913496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: bottom;
        border-top: none;
        border-right: .5pt solid windowtext;
        border-bottom: none;
        border-left: .5pt solid windowtext;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl8013496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: italic;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: bottom;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl8113496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: bottom;
        border-top: .5pt solid windowtext;
        border-right: none;
        border-bottom: .5pt solid windowtext;
        border-left: .5pt solid windowtext;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl8213496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: bottom;
        border-top: .5pt solid windowtext;
        border-right: none;
        border-bottom: .5pt solid windowtext;
        border-left: none;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl8313496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: bottom;
        border-top: .5pt solid windowtext;
        border-right: .5pt solid windowtext;
        border-bottom: .5pt solid windowtext;
        border-left: none;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl8413496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: middle;
        border-top: .5pt solid windowtext;
        border-right: none;
        border-bottom: none;
        border-left: .5pt solid windowtext;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl8513496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: middle;
        border-top: .5pt solid windowtext;
        border-right: .5pt solid windowtext;
        border-bottom: none;
        border-left: none;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl8613496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: middle;
        border-top: none;
        border-right: none;
        border-bottom: .5pt solid windowtext;
        border-left: .5pt solid windowtext;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl8713496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: middle;
        border-top: none;
        border-right: .5pt solid windowtext;
        border-bottom: .5pt solid windowtext;
        border-left: none;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl8813496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 11.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: bottom;
        border-top: .5pt solid windowtext;
        border-right: none;
        border-bottom: .5pt solid windowtext;
        border-left: .5pt solid windowtext;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl8913496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 11.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: bottom;
        border-top: .5pt solid windowtext;
        border-right: .5pt solid windowtext;
        border-bottom: .5pt solid windowtext;
        border-left: none;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl9013496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: middle;
        border-top: none;
        border-right: none;
        border-bottom: none;
        border-left: .5pt solid windowtext;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl9113496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 9.0pt;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: middle;
        border-top: none;
        border-right: .5pt solid windowtext;
        border-bottom: none;
        border-left: none;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl9213496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 11.0pt;
        font-weight: 700;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: bottom;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }

    .xl9313496 {
        padding-top: 1px;
        padding-right: 1px;
        padding-left: 1px;
        mso-ignore: padding;
        color: black;
        font-size: 11.0pt;
        font-weight: 700;
        font-style: normal;
        text-decoration: none;
        font-family: Calibri, sans-serif;
        mso-font-charset: 0;
        mso-number-format: General;
        text-align: center;
        vertical-align: top;
        mso-background-source: auto;
        mso-pattern: auto;
        white-space: nowrap;
    }
    -->
</style>
@endpush
@section('content')
<div class="container-fluid mt-5" style="z-index: 1000">
    <div class="row">
        <div class="col-3 mt-4">
            @if(isset($_GET['bulan'])||isset($_GET['tahun'])||isset($_GET['user']))
            <a href="{{route('cetak2', ['bulan' => $_GET['bulan'],'tahun' => $_GET['tahun'], 'user' => $_GET['user']])}}" class="btn btn-success">Cetak Laporan</a>
            @endif
        </div>
    </div>

    @php
    $month = array("January","February","March","April","Mei","June","July","August","September","October","November","December");
    $tahun_time = $years;
    $pegawai = $users;
    $tahun=[];
    @endphp
    <form>
        <div class="col-3  mt-1">

            <select class="browser-default custom-select" id="bulan" onchange="show();" style="margin-left: -15px">
                @for($a=0;$a<12;$a++) <option value="{{$month[$a]}}">{{$month[$a]}}</option>

                    @endfor
            </select>

        </div>
        <div class="col-3 row mt-1">

            <select class="browser-default custom-select" id="tahun" onchange="show();">
                @for($a=0;$a<count($tahun_time);$a++) <option value="{{$tahun_time[$a]->tahun}}">{{$tahun_time[$a]->tahun}}</option>
                    @endfor
            </select>

        </div>
        <div class="col-3 row mt-1">
            <select class="browser-default custom-select" id="user" onchange="show();">
                @for($a=0;$a<count($pegawai);$a++) <option value="{{$pegawai[$a]->user }}">{{$pegawai[$a]->user}}</option>
                    @endfor
            </select>

        </div>
    </form>
</div>
<div id="Blangko O_13496" class="mt-5" align=center x:publishsource="Excel">

    <table border=0 cellpadding=0 cellspacing=0 width=683 style='border-collapse:
 collapse;table-layout:fixed;width:513pt'>
        <col width=44 span=2 style='mso-width-source:userset;mso-width-alt:1609;
 width:33pt'>
        <col width=56 style='mso-width-source:userset;mso-width-alt:2048;width:42pt'>
        <col width=83 style='mso-width-source:userset;mso-width-alt:3035;width:62pt'>
        <col width=48 style='mso-width-source:userset;mso-width-alt:1755;width:36pt'>
        <col width=70 style='mso-width-source:userset;mso-width-alt:2560;width:53pt'>
        <col width=48 style='mso-width-source:userset;mso-width-alt:1755;width:36pt'>
        <col width=70 style='mso-width-source:userset;mso-width-alt:2560;width:53pt'>
        <col width=73 style='mso-width-source:userset;mso-width-alt:2669;width:55pt'>
        <col width=83 style='mso-width-source:userset;mso-width-alt:3035;width:62pt'>
        <col width=64 style='width:48pt'>
        <tr height=20 style='height:15.0pt'>
            <td height=20 class=xl1513496 width=44 style='height:15.0pt;width:33pt'><a name="RANGE!A1:K43"></a></td>
            <td class=xl1513496 width=44 style='width:33pt'></td>
            <td class=xl1513496 width=56 style='width:42pt'></td>
            <td class=xl1513496 width=83 style='width:62pt'></td>
            <td class=xl1513496 width=48 style='width:36pt'></td>
            <td class=xl1513496 width=70 style='width:53pt'></td>
            <td class=xl1513496 width=48 style='width:36pt'></td>
            <td class=xl1513496 width=70 style='width:53pt'></td>
            <td colspan=2 class=xl8813496 width=156 style='border-right:.5pt solid black;
  width:117pt'>Blangko 08</td>
            <td class=xl1513496 width=64 style='width:48pt'></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td colspan=10 height=20 class=xl9213496 style='height:15.0pt'>PENCATAAN
                DEBIT BANGUNAN PENGAMBILAN /</td>
            <td class=xl1513496></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td colspan=10 height=20 class=xl9313496 style='height:15.0pt'>PENCATAAN
                DEBIT SUNGAI</td>
            <td class=xl1513496></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td height=20 class=xl1513496 style='height:15.0pt'></td>
            <td class=xl1513496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl1513496></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td height=20 class=xl1513496 style='height:15.0pt'></td>
            <td class=xl1513496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl7713496></td>
            <td class=xl1513496></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td height=20 class=xl7613496 colspan=2 style='height:15.0pt'>Daerah
                Irigasi<span style='mso-spacerun:yes'></span></td>
            <td class=xl7513496></td>
            <td class=xl6813496>:</td>
            <td class=xl6913496></td>
            <td class=xl6913496></td>
            <td class=xl7013496 colspan=2>Kabupaten<span style='mso-spacerun:yes'></span></td>
            <td class=xl6813496>: Sleman</td>
            <td class=xl6813496></td>
            <td class=xl1513496></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td height=20 class=xl7613496 colspan=2 style='height:15.0pt'>Sungai<span style='mso-spacerun:yes'></span></td>
            <td class=xl7513496></td>
            <td class=xl6813496>:</td>
            <td class=xl6913496></td>
            <td class=xl6813496></td>
            <td class=xl6813496 colspan=2>Pengamat</td>
            <td class=xl6813496>:</td>
            <td class=xl6813496></td>
            <td class=xl1513496></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td height=20 class=xl7613496 colspan=3 style='height:15.0pt'>Daerah
                Irigasi<span style='mso-spacerun:yes'> </span></td>
            <td class=xl6813496>:</td>
            <td class=xl6913496></td>
            <td class=xl6813496></td>
            <td class=xl6813496 colspan=2>Bag.Pelaks. Kegiatan</td>
            <td class=xl6813496>: Sie OP</td>
            <td class=xl6813496></td>
            <td class=xl1513496></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td height=20 class=xl7613496 colspan=3 style='height:15.0pt'>Total Luas
                Sawah Irigasi<span style='mso-spacerun:yes'> </span></td>
            <td class=xl6813496>:<span style='mso-spacerun:yes'>
                </span>ha</td>
            <td class=xl6913496></td>
            <td class=xl7313496 colspan=3>Periode Pemberian Air Tanggal =</td>
            <td class=xl7413496>1 s/d 15</td>
            @if(isset($_GET['bulan']))
            <td class=xl6813496 colspan=2>bulan {{$_GET['bulan']}}</td>
            @endif
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td height=20 class=xl6813496 style='height:15.0pt'></td>
            <td class=xl6913496></td>
            <td class=xl6913496></td>
            <td class=xl6913496></td>
            <td class=xl6913496></td>
            <td class=xl7313496></td>
            <td class=xl7313496></td>
            <td class=xl6813496></td>
            <td class=xl7313496>16 s/d ..</td>
            <td class=xl6913496></td>
            <td class=xl1513496></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td height=20 class=xl6613496 style='height:15.0pt'></td>
            <td class=xl6713496></td>
            <td class=xl6313496></td>
            <td class=xl6613496></td>
            <td class=xl6413496></td>
            <td class=xl6413496></td>
            <td class=xl6513496></td>
            <td class=xl6513496></td>
            <td class=xl6513496></td>
            <td class=xl6513496></td>
            <td class=xl1513496></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td colspan=2 rowspan=3 height=60 class=xl8413496 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;height:45.0pt'>Tanggal</td>
            <td colspan=2 rowspan=2 class=xl8413496 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black'>Debit Limpas Bendung</td>
            <td colspan=4 class=xl8113496 style='border-right:.5pt solid black;
  border-left:none'>Debit Pintu Masuk Pengambilan</td>
            <td colspan=2 class=xl8113496 style='border-right:.5pt solid black;
  border-left:none'>Debit Sungai<span style='mso-spacerun:yes'></span></td>
            <td class=xl1513496></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td colspan=2 height=20 class=xl8113496 style='border-right:.5pt solid black;
  height:15.0pt;border-left:none'>Kanan</td>
            <td colspan=2 class=xl8113496 style='border-right:.5pt solid black;
  border-left:none'>Kiri</td>
            <td class=xl7913496 style='border-left:none'>Debit Sungai</td>
            <td class=xl7913496 style='border-left:none'>Rerata 5</td>
            <td class=xl1513496></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td height=20 class=xl7113496 style='height:15.0pt;border-top:none;
  border-left:none'>H (cm)</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>Q (l/det)</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>H (cm)</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>Q (l/det)</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>H (cm)</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>Q (l/det)</td>
            <td class=xl7813496 style='border-left:none'>(l/det)</td>
            <td class=xl7813496 style='border-left:none'>harian (l/det)</td>
            <td class=xl1513496></td>
        </tr>
        <tr height=20 style='height:15.0pt'>
            <td colspan=2 height=20 class=xl8113496 style='border-right:.5pt solid black;
  height:15.0pt'>1</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>2</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>3</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>4</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>5</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>6</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>7</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>8</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>9</td>
            <td class=xl1513496></td>
        </tr>
        @for($a=1;$a<=15;$a++)
        <tr height=20 style='height:15.0pt'>
            <td height=20 class=xl7113496 style='height:15.0pt;border-top:none'>{{ $a }}</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>{{ $a + 15 }}</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>
                {{ is_null($debitData[0]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            }))?0:$debitData[0]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            })->debit }}
                {{ '/' }}
                {{ is_null($debitData[0]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == ($a + 15);
            }))?0:$debitData[0]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == ($a + 15);
            })->debit }}
            </td>
            <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>
                {{ is_null($debitData[1]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            }))?0:$debitData[1]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            })->debit }}
                {{ '/' }}
                {{ is_null($debitData[1]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == ($a + 15);
            }))?0:$debitData[1]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == ($a + 15);
            })->debit }}
            </td>
            <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
            <td class=xl7113496 style='border-top:none;border-left:none'>
                {{ is_null($debitData[1]->first(function ($item) use ($a) {
               return $item['created_at']->format('d')  == $a;
           }))?0:$debitData[1]->first(function ($item) use ($a) {
               return $item['created_at']->format('d')  == $a;
           })->debit }}
                {{ '/' }}
                {{ is_null($debitData[1]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == ($a + 15);
            }))?0:$debitData[1]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == ($a + 15);
            })->debit }}
            </td>
            <td class=xl7113496 style='border-top:none;border-left:none'>
                {{ is_null($debitData[2]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            }))?0:$debitData[2]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            })->debit }}
                {{ '/' }}
                {{ is_null($debitData[2]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == ($a + 15);
            }))?0:$debitData[2]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == ($a + 15);
            })->debit }}
            </td>
            <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
            </tr>
            @endfor
            <tr height=20 style='height:15.0pt'>
                @php
                $a = 31;
                @endphp
                <td height=20 class=xl7113496 style='height:15.0pt;border-top:none'></td>
                <td class=xl7113496 style='border-top:none;border-left:none'>{{ 31 }}</td>
                <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7113496 style='border-top:none;border-left:none'>
                    {{ is_null($debitData[0]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            }))?0:$debitData[0]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            })->debit }}
                </td>
                <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7113496 style='border-top:none;border-left:none'>
                    {{ is_null($debitData[1]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            }))?0:$debitData[1]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            })->debit }}
                </td>
                <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7113496 style='border-top:none;border-left:none'>
                    {{ is_null($debitData[1]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            }))?0:$debitData[1]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            })->debit }}
                </td>
                <td class=xl7113496 style='border-top:none;border-left:none'>
                    {{ is_null($debitData[2]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            }))?0:$debitData[2]->first(function ($item) use ($a) {
                return $item['created_at']->format('d')  == $a;
            })->debit }}
                </td>
                <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl7113496 style='height:15.0pt;border-top:none'>&nbsp;</td>
                <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7113496 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl1513496></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl1513496 style='height:15.0pt'></td>
                <td class=xl1513496></td>
                <td class=xl7713496></td>
                <td class=xl7713496></td>
                <td class=xl7713496></td>
                <td class=xl7713496></td>
                <td class=xl7713496></td>
                <td class=xl7713496></td>
                <td class=xl7713496></td>
                <td class=xl7713496></td>
                <td class=xl1513496></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl6813496 style='height:15.0pt'></td>
                <td class=xl6813496></td>
                <td class=xl6913496></td>
                <td class=xl6913496></td>
                <td class=xl6913496></td>
                <td class=xl6913496></td>
                <td class=xl6913496></td>
                <td class=xl6913496></td>
                <td class=xl6913496>Sleman,   {{ \Carbon\Carbon::now()->formatLocalized('%d %B %Y')}} </td>
                <td class=xl6913496></td>
                <td class=xl1513496></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl7213496 colspan=2 style='height:15.0pt'>Penjelasan :</td>
                <td class=xl6913496></td>
                <td class=xl6913496></td>
                <td class=xl6913496></td>
                <td class=xl6913496></td>
                <td class=xl6913496></td>
                <td class=xl6913496></td>
                <td class=xl6913496></td>
                <td class=xl6913496></td>
                <td class=xl1513496></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl6813496 colspan=4 style='height:15.0pt'><span style='mso-spacerun:yes'></span>1. Pencatatan debit dilakukan tiap</td>
                <td class=xl6913496></td>
                <td class=xl7013496>Pengamat</td>
                <td class=xl1513496></td>
                <td class=xl6913496></td>
                <td class=xl7013496 colspan=2>Petugas Operasi Bendung</td>
                <td class=xl1513496></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl6813496 colspan=3 style='height:15.0pt'><span style='mso-spacerun:yes'></span>pukul 08.00 WIB.</td>
                <td class=xl7013496></td>
                <td class=xl6913496></td>
                <td class=xl7013496></td>
                <td class=xl1513496></td>
                <td class=xl6913496></td>
                <td class=xl7013496></td>
                <td class=xl1513496></td>
                <td class=xl1513496></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl6813496 colspan=4 style='height:15.0pt'><span style='mso-spacerun:yes'></span>2. Perhitungan kolom 8 dan 9 oleh</td>
                <td class=xl6913496></td>
                <td class=xl7013496 colspan=2>Tanda tangan :</td>
                <td class=xl6913496></td>
                <td class=xl7013496 colspan=2>Tanda tangan :</td>
                <td class=xl1513496></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl6813496 colspan=4 style='height:15.0pt'><span style='mso-spacerun:yes'></span>Pembantu pelaksana OP</td>
                <td class=xl6913496></td>
                <td class=xl7013496></td>
                <td class=xl1513496></td>
                <td class=xl6913496></td>
                <td class=xl7013496></td>
                <td class=xl1513496></td>
                <td class=xl1513496></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl6813496 style='height:15.0pt'></td>
                <td class=xl6813496></td>
                <td class=xl6913496></td>
                <td class=xl7013496></td>
                <td class=xl6913496></td>
                <td class=xl7013496></td>
                <td class=xl1513496></td>
                <td class=xl6913496></td>
                <td class=xl7013496></td>
                <td class=xl1513496></td>
                <td class=xl1513496></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl7213496 style='height:15.0pt'></td>
                <td class=xl6813496></td>
                <td class=xl6913496></td>
                <td class=xl7013496></td>
                <td class=xl6913496></td>
                <td class=xl7013496></td>
                <td class=xl1513496></td>
                <td class=xl6913496></td>
                <td class=xl7013496></td>
                <td class=xl1513496></td>
                <td class=xl1513496></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl7213496 style='height:15.0pt'></td>
                <td class=xl7213496></td>
                <td class=xl8013496></td>
                <td class=xl7013496></td>
                <td class=xl6913496></td>
                <td class=xl7013496>Nama:</td>
                <td class=xl1513496></td>
                <td class=xl6913496></td>
                <td class=xl7013496>Nama :</td>
                <td class=xl1513496></td>
                <td class=xl1513496></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl7213496 style='height:15.0pt'></td>
                <td class=xl7213496></td>
                <td class=xl8013496></td>
                <td class=xl7013496></td>
                <td class=xl6913496></td>
                <td class=xl7013496>NIP :</td>
                <td class=xl1513496></td>
                <td class=xl6913496></td>
                <td class=xl7013496>NIP :</td>
                <td class=xl1513496></td>
                <td class=xl1513496></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl6813496 style='height:15.0pt'></td>
                <td class=xl6813496></td>
                <td class=xl6813496></td>
                <td class=xl6813496></td>
                <td class=xl6813496></td>
                <td class=xl6813496></td>
                <td class=xl1513496></td>
                <td class=xl6813496></td>
                <td class=xl6813496></td>
                <td class=xl1513496></td>
                <td class=xl1513496></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl6813496 style='height:15.0pt'></td>
                <td class=xl6813496></td>
                <td class=xl6813496></td>
                <td class=xl6813496></td>
                <td class=xl6813496></td>
                <td class=xl6813496></td>
                <td class=xl6813496></td>
                <td class=xl6813496></td>
                <td class=xl6813496></td>
                <td class=xl6813496></td>
                <td class=xl1513496></td>
            </tr>
            <![if supportMisalignedColumns]>
            <tr height=0 style='display:none'>
                <td width=44 style='width:33pt'></td>
                <td width=44 style='width:33pt'></td>
                <td width=56 style='width:42pt'></td>
                <td width=83 style='width:62pt'></td>
                <td width=48 style='width:36pt'></td>
                <td width=70 style='width:53pt'></td>
                <td width=48 style='width:36pt'></td>
                <td width=70 style='width:53pt'></td>
                <td width=73 style='width:55pt'></td>
                <td width=83 style='width:62pt'></td>
                <td width=64 style='width:48pt'></td>
            </tr>
            <![endif]>
    </table>

</div>
@endsection
@push('js')
<script type="text/javascript">
    function show() {
        var optionBulan = $('#bulan').find("option:selected").attr('value');
        var optionTahun = $('#tahun').find("option:selected").attr('value');
        var optionPegawai = $('#user').find("option:selected").attr('value');
        window.location.href = '/admin/laporan_blanko8?bulan=' + optionBulan + '&tahun=' + optionTahun + '&user=' + optionPegawai;
        return;
        var token = Cookies.get('token');

        var form = new FormData();
        form.append('user', $("#user").val());
        form.append('bulan', $("#bulan").val());
        form.append('tahun', $("#tahun").val());
        console.log(optionBulan);
        console.log(optionTahun);
        fetch('/admin/laporan_blanko8?bulan=' + optionBulan + '&tahun=' + optionTahun + 'user=' + optionPegawai, {
            type: 'GET',
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            },
        });
    }
    // $(document).ready(function () {
    //     $('#bulan').on('change',function(){
    //         var token = Cookies.get('token');
    //         var optionSelected = $(this).find("option:selected");
    //         var bulan = optionSelected.val();
    //         console.log(bulan);
    //         $.ajax({
    //             type:'GET',
    //             url:'',
    //             header: {'Accept':'application/json',
    //             'Authorization' : 'Bearer '+token}
    //
    //         })
    //     })
    // })
</script>
@endpush
