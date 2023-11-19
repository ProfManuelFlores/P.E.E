<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        @include('sweetalert::alert')
        @admin()
            @include('plantillas.admin.navbar')
        @endadmin
        @student()
            @include('plantillas.alumno.navbar')
        @endstudent

        @enterprise()
            @include('plantillas.asesorempresarial.navbar')
        @endenterprise

        @academic()
            @include('plantillas.asesoracademico.navbar')
        @endacademic
    </header>
    <section>
        <p class="title text-center py-10"> Perfil de usuario </p>
        @admin()

        @endadmin
        @student()
            <form action="{{ route('updatedataprofile') }}" method="POST">
                @csrf
                <div class="form_general">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="first_name" class="label_line">Nombres</label>
                            <input type="text" id="first_name" name="first_name" class="inputs_line" placeholder="John"
                                value="{{ $userdata->First_name }}">
                        </div>
                        <div>
                            <label for="last_name" class="label_line">Apellidos</label>
                            <input type="text" id="last_name" name="last_name" class="inputs_line" placeholder="Doe"
                                value="{{ $userdata->Last_name }}">
                        </div>
                        <div>
                            <label for="phone" class="label_line">Matricula</label>
                            <input type="tel" id="Tuition" name="Tuition" value="{{ $studentdata->Tuition ?? '' }}"
                                class="inputs_line" placeholder="2000000000" pattern="[0-9]{10}">
                        </div>
                        <div>
                            <label for="label_line" class="label_line">¿cual es tu genero?</label>
                            <select name="genre" id="genre" class="select_line">
                                @foreach ($Genre as $g)
                                    <option value="{{ $g->IdGender }}"
                                        {{ $g->IdGender == $userdata->IdGender ? 'selected' : '' }}>{{ $g->Desc_Gender }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="label_line" class="label_line">¿tienes alguna discapacidad?</label>
                        <select name="Disability" id="Disability" class="select_line">
                            <option value="0" {{ $studentdata->Disability == 0 ? 'selected' : '' }}>no</option>
                            <option value="1" {{ $studentdata->Disability == 1 ? 'selected' : '' }}>si</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="label_line" class="label_line">¿hablas alguna lengua indigena?</label>
                        <select name="Indigenous_Language" id="Indigenous_Language" class="select_line">
                            <option value="0" {{ $studentdata->Indigenous_Language == 0 ? 'selected' : '' }}>no</option>
                            <option value="1" {{ $studentdata->Indigenous_Language == 1 ? 'selected' : '' }}>si</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="label_line" class="label_line">¿que carrera llevas?</label>
                        <select name="Indigenous_Language" id="Indigenous_Language" class="select_line">
                            <option value="0">no</option>
                            <option value="1">si</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="label_line">Email address</label>
                        <input type="email" name="email" id="email" class="inputs_line"
                            value="{{ $userdata->email }}" readonly>
                    </div>
                    <div class="mb-6">
                        <label for="password" class="label_line">Password</label>
                        <input type="password" id="password" name="password" class="inputs_line" placeholder="•••••••••"
                            required>
                    </div>
                    <button class="button-1">subir</button>
                </div>
            </form>
        @endstudent

        @enterprise()
            <form action="{{ route('updatedataprofile') }}" method="POST">
                @csrf
                <div class="form_general">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="first_name" class="label_line">Nombres</label>
                            <input type="text" id="first_name" name="first_name" class="inputs_line" placeholder="John"
                                value="{{ $userdata->First_name }}">
                        </div>
                        <div>
                            <label for="last_name" class="label_line">Apellidos</label>
                            <input type="text" id="last_name" name="last_name" class="inputs_line" placeholder="Doe"
                                value="{{ $userdata->Last_name }}">
                        </div>
                        <div>
                            <label for="label_line" class="label_line">¿cual es tu genero?</label>
                            <select name="genre" id="genre" class="select_line">
                                @foreach ($Genre as $g)
                                    <option value="{{ $g->IdGender }}"
                                        {{ $g->IdGender == $userdata->IdGender ? 'selected' : '' }}>{{ $g->Desc_Gender }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="label_line" class="label_line">¿que grado de estudio tiene?</label>
                        <select name="Degree" id="Degree" class="select_line">
                            @foreach ($Degree as $d)
                                <option value="{{$d->IdDegree}}" {{$d->IdDegree == $userdata->IdDegree ? 'selected' : ''}}>{{$d->Desc_Degree}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="label_line" class="label_line">¿en que area practica?</label>
                        <select name="Knowledge" id="Knowledge" class="select_line">
                            @foreach ($Knowledge as $k)
                                <option value="{{$k->IdArea}}" {{$userdata->IdArea == $k->IdArea ? 'selected' : ''}}>{{$k->Desc_Area}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="label_line" class="label_line">¿que empresa trabaja?</label>
                        <select name="Enterprise" id="Enterprise" class="select_line">
                            @if ($enterprise != null)
                                @foreach ($enterprises as $p)
                                    <option value="{{$p->Rcf}}"{{$p->Rcf == $enterprise->IdEnterprise ? 'selected' : ''}}>{{$p->Name}}</option>
                                @endforeach
                            @else 
                                @foreach ($enterprises as $p)
                                    <option value="{{$p->Rcf}}">{{$p->Name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="label_line">Email address</label>
                        <input type="email" name="email" id="email" class="inputs_line"
                            value="{{ $userdata->email }}" readonly>
                    </div>
                    <div class="mb-6">
                        <label for="password" class="label_line">Password</label>
                        <input type="password" id="password" name="password" class="inputs_line" placeholder="•••••••••"
                            required>
                    </div>
                    <button class="button-1">subir</button>
                </div>
            </form>
        @endenterprise

        @academic()
        <form action="{{ route('updatedataprofile') }}" method="POST">
            @csrf
            <div class="form_general">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="first_name" class="label_line">Nombres</label>
                        <input type="text" id="first_name" name="first_name" class="inputs_line" placeholder="John"
                            value="{{ $userdata->First_name }}">
                    </div>
                    <div>
                        <label for="last_name" class="label_line">Apellidos</label>
                        <input type="text" id="last_name" name="last_name" class="inputs_line" placeholder="Doe"
                            value="{{ $userdata->Last_name }}">
                    </div>
                    <div>
                        <label for="label_line" class="label_line">¿cual es tu genero?</label>
                        <select name="genre" id="genre" class="select_line">
                            @foreach ($Genre as $g)
                                <option value="{{ $g->IdGender }}"
                                    {{ $g->IdGender == $userdata->IdGender ? 'selected' : '' }}>{{ $g->Desc_Gender }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="label_line" class="label_line">¿que grado de estudio tiene?</label>
                    <select name="Degree" id="Degree" class="select_line">
                        @foreach ($Degree as $d)
                            <option value="{{$d->IdDegree}}" {{$d->IdDegree == $userdata->IdDegree ? 'selected' : ''}}>{{$d->Desc_Degree}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="label_line" class="label_line">¿en que area practica?</label>
                    <select name="Knowledge" id="Knowledge" class="select_line">
                        @foreach ($Knowledge as $k)
                            <option value="{{$k->IdArea}}" {{$userdata->IdArea == $k->IdArea ? 'selected' : ''}}>{{$k->Desc_Area}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="email" class="label_line">Email address</label>
                    <input type="email" name="email" id="email" class="inputs_line"
                        value="{{ $userdata->email }}" readonly>
                </div>
                <div class="mb-6">
                    <label for="password" class="label_line">Password</label>
                    <input type="password" id="password" name="password" class="inputs_line" placeholder="•••••••••"
                        required>
                </div>
                <button class="button-1">subir</button>
            </div>
        </form>
        @endacademic
        <p class="subtitle py-8 text-center"> Cambiar contraseña</p>
        <form action="{{route('updatepassword')}}" method="POST">
            @csrf
            <div class="form_general">
                <div class="mb-6">
                    <label for="oldpassword" class="label_line">Antigua contraseña</label>
                    <input type="password" class="inputs_line" id="password" name="password">
                </div>
                <div class="mb-6">
                    <label for="newpassword">Nueva Contraseña</label>
                    <input type="password" class="inputs_line" id="newpass" name="newpass">
                </div>
                <div class="hidden">
                    <input type="text" id="email" name="email" value="{{ $userdata->email }}" readonly>
                </div>
                <button class="button-1" data-confirm-delete="true">Cambiar contraseña</button>
            </div>
        </form>
    </section>
</body>

</html>
