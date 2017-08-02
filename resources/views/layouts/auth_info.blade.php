@extends('main')

@section('nav')
    @include('navigation.navbar')
@stop

@section('content')
    <div class="container">
        <div class="auth-cotainer">
            <h2>Tapatybės patvirtinimas - kas tai?</h2>
            <p>Tapatybės patvirtinimo sistema leidžia užtikrinti, jog vienas asmuo Uždarbis.lt naudojasi tik vienu slapyvardžiu. Tai būtina priemonė norint apsisaugoti nuo nesąžiningų žmonių, siekiančių pasipelnyti apgaulės būdu: pavyzdžiui, neatsiskaitant už prekes ar paslaugas ir kaskart susikuriant naują paskyrą, tikintis išvilioti pinigus iš kitų forumo dalyvių. Per pirmuosius gyvavimo metus tapatybės patvirtinimo sistema padėjo daugiau nei per pus sumažinti apgavysčių forume skaičių.</p>
            <h2>Kaip veikia tapatybės patvirtinimo sistema?</h2>
            <p>Kiekvienas forumo narys, norintis patvirtinti savo tapatybę, turi turėti bet kurio Lietuvos banko sąskaitą su elektroninės bankininkystės paslauga. Patvirtinimo procedūra yra visiškai automatizuota ir trunka kelias minutes, per kurias:
                <ul>
                    <li>
                        Vedlio pagalba greitai ir paprastai atliekamas bankinis pavedimas
                    </li>
                    <li>
                        Sistema iš banko kartu su pavedimo informacija gauna jūsų vardą ir pavardę
                    </li>
                    <li>
                        Unikalus 64 simbolių raktas sukuriamas užšifravus jūsų vardą ir pavardę neatkoduojamu algoritmu
                    </li>
                    <li>
                        Jūsų tapatybės raktas yra susiejamas su jūsų slapyvardžiu ir tampate patvirtintu forumo nariu
                    </li>
                    <li>
                        Vedlio pagalba greitai ir paprastai atliekamas bankinis pavedimas
                    </li>
                </ul>
            Vienkartinis tapatybės patvirtinimo mokestis yra €3. Taip kiekvienas savo tapatybę patvirtinęs narys prisideda prie bendruomenės plėtros diegiant tokias funkcijas, kaip realaus laiko pokalbiai, ir įgyvendinant tokias iniciatyvas, kaip Uždarbis.lt žurnalas, Geriausio straipsnio konkursas ir galbūt ateityje - Uždarbis.lt konferencija.
            </p>

            <button class="auth-user center-block">Pradėti tapatybės patvirtinimo procedūrą</button>
        </div>
    </div>
@endsection