<div class="container-general">
@extends('layouts.menuDashboard')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <h5 class="card-title text-primary text-center text-wrap">Bienvenido a tu Dashboard de Progreso Personal <br><span class="fw-bold">{{ $jsonCreated['nombreCompleto'] }}</span></h5>
                    <div class="d-flex align-items-end row">
                        <div class="row">
                            <div class="col-sm-8 text-center text-wrap">
                                <div class="card-body">
                                    <p class="mb-auto small-text text-wrap">Sigue tus logros y avances en tu entrenamiento personalizado. <br>Visualiza estadísticas y gráficos para mantenerte motivado/a en tu camino hacia una versión más fuerte y saludable.
                                        <br><span class="fw-bold">¡Éxito asegurado!</span></p>
                                </div>
                            </div>
                            <div class="col-sm-4 d-flex align-items-center">
                                <div class="card-body pb-0 px-0 px-md-1">
                                    <img src="{{asset('assets/img/illustrations/entrenador2.png')}}" height="110" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 order-1">
                <div class="cardG cardG-export">
                    <div class="infos">
                        <div class="info">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="name">
                                        {{ $jsonCreated['nombreCompleto'] }}
                                    </p>
                                    <p class="function">
                                        Usuario
                                    </p>
                                </div>
                                {{-- <div class="col-md-6 d-flex align-items-left ">
                                        <img src="{{asset('assets/img/icons/dashboard/personal.png')}}" height="50" >
                                </div> --}}
                            </div>
                            <div class="stats">
                                    <p class="flex flex-col">
                                        Edad
                                        <span class="state-value">
                                            {{ $jsonCreated['edad'] }}
                                        </span>
                                    </p>
                                    @foreach ($jsonCreated['datosUsuario'] as $row)
                                    <p class="flex">
                                        Peso
                                        <span class="state-value">
                                            {{$row['PESOUSUARIO']}}
                                        </span>
                                    </p>
                                    <p class="flex">
                                        Altura
                                        <span class="state-value">
                                            {{$row['ALTURAUSUARIO']}}
                                        </span>
                                    </p>
                                    @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 order-0">
                <div class="cardU mb-4">
                    <div class="item item--1">
                        <svg id="Bahan_copy_5" height="532" viewBox="0 0 64 64" width="532" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-name="Bahan copy 5"><linearGradient id="linear-gradient" gradientUnits="userSpaceOnUse" x1="4" x2="59.984" y1="31.999" y2="31.999"><stop offset="0" stop-color="#444afc"/><stop offset="1" stop-color="#444afc"/></linearGradient><path d="m23.27637 34.42627c5.59976 6.11087 13.70233 4.26594 18.0353-1.01555 4.56675-6.03865 1.62632-12.66414.14976-15.2325a11.655 11.655 0 0 0 -1.96582-2.45556 14.55394 14.55394 0 0 1 -2.81788-4.80909 9.132 9.132 0 0 1 -.27-3.108 1.0072 1.0072 0 0 0 -1.52738-.84952 14.69587 14.69587 0 0 0 -7.12108 15.15768c-2.09082-1.32031-2.00342-4.45459-1.99756-4.61231a.99969.99969 0 0 0 -1.62647-.81835c-5.78344 4.64572-4.48136 13.97815-.85887 17.7432zm.71142-14.74805a5.94864 5.94864 0 0 0 4.96534 4.94385 1.00782 1.00782 0 0 0 1.09372-1.29982 12.73411 12.73411 0 0 1 4.3677-13.60252 13.69179 13.69179 0 0 0 3.66824 7.419c4.15016 3.83873 5.96575 13.4981-1.25143 17.55851-3.117 1.77635-7.7464 2.93358-12.10577-1.64894a7.9375 7.9375 0 0 1 -1.9292-3.41846c-.6543-2.46968-1.24317-6.74312 1.1914-9.95162zm35.01221 18.51953h-4.18213l-4.00928 4.98631a1.00617 1.00617 0 0 1 -1.55859 0l-3.92969-4.89062-7.11182 18.26366a1.00681 1.00681 0 0 1 -1.67919.30179l-5.33008-5.99659h-8.25781a1.00032 1.00032 0 0 1 -.95655-.708l-1.8457-6.04785-6.69336 12.5581a.99881.99881 0 0 1 -.88232.52979h-7.56348a1 1 0 0 1 0-2h6.96338l7.54541-14.15723a1.00006 1.00006 0 0 1 1.83887.17822l2.334 7.647h7.9668a1.00085 1.00085 0 0 1 .74756.33545l4.542 5.11036 7.14648-18.35254a.99972.99972 0 0 1 1.71094-.26368l4.23438 5.26954 3.52978-4.39014a.99975.99975 0 0 1 .7793-.37354h4.6611a1.00013 1.00013 0 0 1 0 1.99997z" fill="url(#linear-gradient)"/></svg>
                        <span class="quantity">{{$jsonCreated['consultaU']['suma_kcalEjercicio']}}</span>
                        <span class="text text--1 text-center"> Calorias <br>Quemadas </span>
                    </div>
                    <div class="item item--2">
                        <svg id="Layer_1" enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="94.852" x2="341.015" y1="424.639" y2="178.475"><stop offset="0" stop-color="#fc4422"/><stop offset="1" stop-color="#ffbb32"/></linearGradient><path d="m365.158 387.551 17.989 67.138-21.534-7.797c-1.593-.577-3.372-.094-4.464 1.198l-14.809 17.521-17.986-67.219 13.326 4.683c6.62 2.326 13.864.398 18.428-4.94zm-149.737-70.644 5.29-15.131c.729-1.999.728-3.844-.004-5.855l-5.286-15.107c-2.317-6.622-.409-13.858 4.916-18.436l5.999-5.157v-86.74c0-5.319 8.099-5.318 8.099 0v72.273l1.742.163 2.222-11.799c1.295-6.881 6.579-12.203 13.466-13.495l12.019-2.256v-50.927c0-17.72-14.418-32.15-32.14-32.15h-104.355c-17.721 0-32.14 14.43-32.14 32.15v88.869c0 15.721 11.482 29.203 26.977 31.718l1.113.181v-114.728c0-5.318 8.099-5.318 8.099 0v281.768c0 11.961 9.737 21.711 21.7 21.711 11.987 0 21.7-9.728 21.7-21.711v-134.648c0-5.318 8.099-5.318 8.099 0v134.649c0 11.961 9.737 21.711 21.7 21.711s21.699-9.75 21.699-21.711v-111.76l-5.999-5.157c-5.324-4.578-7.232-11.803-4.916-18.425zm-36.534-202.509c21.067 0 38.179-17.114 38.179-38.179s-17.112-38.179-38.179-38.179c-21.042 0-38.179 17.135-38.179 38.179s17.137 38.179 38.179 38.179zm104.241 283.737-9.05-10.584-17.989 67.138 21.534-7.797c1.593-.577 3.371-.094 4.464 1.198l14.81 17.521 17.986-67.219-13.326 4.683c-6.604 2.32-13.852.412-18.429-4.94zm133.088-78.554c1.25 3.54.274 7.175-2.575 9.618l-12.172 10.439c-3.004 2.576-4.898 5.818-5.627 9.709l-2.95 15.76c-.693 3.706-3.336 6.338-7.039 7.036l-15.731 2.961c-3.892.732-7.124 2.596-9.701 5.601l-10.44 12.17c-2.438 2.843-6.084 3.81-9.614 2.571l-15.122-5.311c-3.724-1.308-7.531-1.308-11.255 0l-15.122 5.311c-3.53 1.24-7.175.272-9.614-2.571l-10.44-12.17c-2.578-3.005-5.81-4.869-9.702-5.601l-15.73-2.961c-3.704-.697-6.335-3.332-7.039-7.033l-2.996-15.76c-.737-3.878-2.582-7.126-5.582-9.702l-12.172-10.449c-2.847-2.444-3.823-6.077-2.574-9.617l5.337-15.121c1.311-3.712 1.311-7.499 0-11.211l-5.337-15.121c-1.25-3.541-.274-7.175 2.574-9.618l12.172-10.441c3.003-2.576 4.842-5.83 5.581-9.71l2.996-15.749c.704-3.699 3.333-6.346 7.039-7.044l15.73-2.961c3.892-.732 7.124-2.596 9.702-5.601l10.448-12.179c2.501-2.846 6.066-3.805 9.606-2.562l15.122 5.311c3.725 1.308 7.531 1.308 11.255 0l15.122-5.311c3.53-1.24 7.176-.272 9.614 2.571l10.44 12.17c2.578 3.005 5.81 4.869 9.701 5.601l15.731 2.961c3.705.698 6.345 3.342 7.039 7.047l2.95 15.749c.729 3.89 2.625 7.132 5.627 9.708l12.172 10.441c2.849 2.443 3.824 6.077 2.575 9.618l-5.337 15.121c-1.311 3.712-1.311 7.499 0 11.211zm-21.761-20.721c0-41.271-33.568-74.821-74.836-74.821-41.269 0-74.836 33.55-74.836 74.821 0 41.265 33.576 74.81 74.836 74.81 41.259 0 74.836-33.544 74.836-74.81zm-65.681-11.617-9.156-18.905-9.15 18.894c-.57 1.218-1.744 2.055-3.059 2.236l-20.833 2.862 15.149 14.533c.974.934 1.439 2.279 1.174 3.61l-3.674 20.681 18.459-9.92c1.195-.632 2.68-.628 3.878.006l18.454 9.917-3.724-20.667c-.227-1.33.24-2.689 1.218-3.627l15.149-14.533-20.833-2.862c-1.314-.181-2.487-1.019-3.052-2.225zm57.581 11.617c0 36.805-29.933 66.729-66.737 66.729-36.805 0-66.737-29.924-66.737-66.729s29.93-66.741 66.737-66.741 66.737 29.936 66.737 66.741zm-24.358-13.4-26.914-3.7-11.834-24.463c-1.467-3.032-5.794-3.031-7.261 0l-11.834 24.463-26.914 3.7c-3.414.469-4.628 4.635-2.275 6.917l19.613 18.816-4.82 26.746c-.587 3.257 2.919 5.874 5.905 4.274l23.956-12.834 23.955 12.834c3.038 1.627 6.484-1.066 5.906-4.274l-4.82-26.746 19.605-18.809c2.352-2.281 1.16-6.452-2.268-6.924z" fill="url(#SVGID_1_)"/></svg>
                        <span class="quantity">{{ $jsonCreated['porcentajeTotalSemanal'] ?? '0' }} %</span>
                        <span class="text text--2 text-center"> Progreso <br>Semanal </span>
                    </div>
                    <div class="item item--3">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve" width="512" height="512">
                            <g id="XMLID_2_">
                                <g>
                                    <path style="fill:#A7E9A2;" d="M19.14,8.2c3.94,0.23,5.63,4.65,5.2,8.1c-0.17,1.39-0.55,2.74-1.13,4.02H4.51    c-1.31-2.9-1.75-6.39-0.18-9.28c1.4-2.93,5.07-3.4,7.89-2.49c0.53,0.14,1.08,0.22,1.63,0.22C15.63,8.72,17.34,7.88,19.14,8.2z"/>
                                    <path style="fill:#386E32;" d="M25.82,13.9c0.26,2.18-0.17,4.39-0.98,6.42h2.21c1.76,0,3.2-1.42,3.22-3.17    c0.02-1.79-1.43-3.25-3.21-3.25H25.82z M17.05,5.13c-0.94,0.42-1.71,1.14-2.21,2.03c1.3-0.35,2.62-0.59,3.97-0.49    c0.3-0.46,0.5-0.97,0.59-1.51C18.63,4.95,17.82,4.93,17.05,5.13z M1.77,22.39v5.34c0,0.31,0.25,0.57,0.57,0.57h24.64    c1.82,0,3.28-1.47,3.29-3.29v-4.47c-1.04,1.02-2.51,1.37-3.94,1.28v2.58c0,0.41-0.34,0.75-0.75,0.75c-0.42,0-0.75-0.34-0.75-0.75    v-2.58h-3.54v1.44c0,0.41-0.34,0.75-0.75,0.75c-1.09-0.05-0.67-1.46-0.75-2.19h-3.53v2.58c0,0.41-0.34,0.75-0.75,0.75    c-0.42,0-0.75-0.34-0.75-0.75v-2.58h-3.54v1.44c0,0.41-0.34,0.75-0.75,0.75c-1.09-0.05-0.67-1.46-0.75-2.19H6.18v2.58    c0,0.41-0.34,0.75-0.75,0.75c-0.42,0-0.75-0.34-0.75-0.75v-2.58H2.34C2.02,21.82,1.77,22.07,1.77,22.39z M19.14,8.2    c-1.8-0.32-3.51,0.52-5.29,0.57c-0.55,0-1.1-0.08-1.63-0.22C9.4,7.64,5.73,8.11,4.33,11.04c-1.57,2.89-1.13,6.38,0.18,9.28h18.7    c0.58-1.28,0.96-2.63,1.13-4.02C24.77,12.85,23.08,8.43,19.14,8.2z M12.61,7.1c-0.25-1.08,0.52-5.65,2.18-4.79    c0.35,0.24,0.44,0.7,0.2,1.05C14.52,4,14.23,4.77,14.14,5.57c1.3-1.93,3.78-2.49,5.91-1.8c1.5,0.3,0.76,2.2,0.35,3.14    c2.67,0.6,4.49,2.91,5.11,5.49h1.54c2.46,0.01,4.5,1.9,4.68,4.35v8.26c-0.01,2.65-2.11,4.78-4.75,4.79H2.34    c-1.14,0-2.07-0.93-2.07-2.07v-5.34c0-1.43,1.29-2.24,2.62-2.07C-0.27,13,3.78,4.42,12.61,7.1z"/>
                                    <path style="fill:#A7E9A2;" d="M1.77,27.73v-5.34c0-0.32,0.25-0.57,0.57-0.57h2.34v2.58c0,0.41,0.33,0.75,0.75,0.75    c0.41,0,0.75-0.34,0.75-0.75v-2.58h3.54c0.08,0.73-0.34,2.14,0.75,2.19c0.41,0,0.75-0.34,0.75-0.75v-1.44h3.54v2.58    c0,0.41,0.33,0.75,0.75,0.75c0.41,0,0.75-0.34,0.75-0.75v-2.58h3.53c0.08,0.73-0.34,2.14,0.75,2.19c0.41,0,0.75-0.34,0.75-0.75    v-1.44h3.54v2.58c0,0.41,0.33,0.75,0.75,0.75c0.41,0,0.75-0.34,0.75-0.75v-2.58c1.43,0.09,2.9-0.26,3.94-1.28v4.47    c-0.01,1.82-1.47,3.29-3.29,3.29H2.34C2.02,28.3,1.77,28.04,1.77,27.73z"/>
                                </g>

                            </g>
                            </svg>
                        <span class="quantity"> {{$jsonCreated['consultaPeso'][0]->diferencia_pesousuario}} Kg</span>
                        <span class="text text--3"> Peso Perdido</span>
                    </div>
                    <div class="item item--4">
                        <svg id="Icon_Set" height="512" viewBox="0 0 256 256" width="512" xmlns="http://www.w3.org/2000/svg"><g><g><circle cx="95.466" cy="24.293" fill="#ffbb98" r="15.263"/><path d="m159.888 57.865c-3.318-5.016-10.072-6.391-15.087-3.073l-23.363 15.456-22.34-15.35c-.011-.007-.023-.013-.034-.021-2.527-1.726-5.821-2.352-8.924-1.529l-45.096 11.964c-6.243 1.656-9.674 8.356-7.387 14.384l10.433 27.506c2.13 5.618 8.412 8.452 14.04 6.318 5.622-2.133 8.451-8.419 6.318-14.041l-6.151-16.218 19.749-5.239v37.119c-18.307 35.252-11.265 27.942-57.549 52.463-5.312 2.815-7.338 9.404-4.523 14.717 2.811 5.308 9.397 7.34 14.717 4.524 44.404-23.525 45.801-21.468 61.769-52.216 24.615 19.849 20.78 14.753 33.641 49.348 2.095 5.636 8.362 8.506 13.999 6.411 5.636-2.095 8.506-8.363 6.411-13.999l-8.109-21.811c-7.023-18.888-18.516-25.805-38.583-41.985v-28.032l11.337 7.789c3.645 2.503 8.459 2.563 12.173.107l29.486-19.506c5.015-3.317 6.391-10.071 3.073-15.086z" fill="#ffe2e2"/><path d="m101.291 38.4c-1.794.746-3.767 1.157-5.825 1.157-8.427 0-15.262-6.835-15.262-15.261 0-8.435 6.835-15.269 15.262-15.269 2.058 0 4.031.412 5.825 1.149-5.538 2.291-9.437 7.751-9.437 14.12.001 6.361 3.9 11.821 9.437 14.104z" fill="#ffcaa6"/><g fill="#ffefee"><path d="m82.046 81.117c5.884-1.561 11.65 2.875 11.65 8.962v22.391c0 1.752-.423 3.485-1.226 5.042-16.784 32.564-11.102 26.14-56.326 50.095-7.476 3.957-7.682 14.508-.691 18.834-14.08 7.482-23.42-12.239-10.959-18.834 46.289-24.519 39.245-17.211 57.551-52.464v-34.026z"/><path d="m98.146 54.314-41.451 10.998c-6.244 1.654-9.677 8.357-7.386 14.384l10.431 27.51c.87 2.291 2.431 4.116 4.349 5.336-.606.388-1.258.715-1.957.979-5.631 2.136-11.914-.699-14.042-6.314l-10.431-27.51c-2.291-6.027 1.142-12.73 7.386-14.384l45.093-11.961c2.742-.731 5.631-.327 8.008.962z"/></g></g><g><path d="m227.198 145.272c-13.452-13.452-35.261-13.452-48.713 0l-6.643 6.643-6.643-6.643c-13.452-13.452-35.261-13.452-48.713 0-13.452 13.452-13.452 35.261 0 48.713l6.643 6.643 44.652 44.652c2.243 2.243 5.88 2.243 8.123 0l51.294-51.294c13.451-13.453 13.451-35.263 0-48.714z" fill="#ff4a73"/><path d="m177.679 243.508-1.775 1.775c-2.242 2.242-5.877 2.242-8.127 0l-44.645-44.653-6.648-6.648c-6.726-6.726-10.089-15.538-10.089-24.351 0-8.82 3.363-17.632 10.089-24.358 8.221-8.221 19.555-11.412 30.197-9.591-6.781 1.16-13.289 4.359-18.52 9.591-6.726 6.726-10.089 15.538-10.089 24.358 0 8.812 3.363 17.625 10.089 24.351l6.648 6.648z" fill="#f973a3"/><path d="m227.198 193.982c-8.731 8.742.147-.139-51.294 51.301-2.242 2.242-5.877 2.242-8.127 0l-1.775-1.775c49.472-49.472 40.888-40.885 49.519-49.526 13.452-13.452 13.452-35.257 0-48.709-5.231-5.231-11.739-8.431-18.52-9.591 10.642-1.822 21.976 1.37 30.197 9.591 13.452 13.452 13.452 35.257 0 48.709z" fill="#ea2a6a"/></g><g fill="#5f266d"><path d="m95.463 43.554c10.62 0 19.27-8.64 19.27-19.26s-8.65-19.26-19.27-19.26-19.26 8.64-19.26 19.26 8.64 19.26 19.26 19.26zm0-30.52c6.21 0 11.27 5.05 11.27 11.26s-5.06 11.26-11.27 11.26-11.26-5.05-11.26-11.26 5.05-11.26 11.26-11.26z"/><path d="m230.023 142.444c-15.001-15.001-39.299-15.05-54.37 0l-3.81 3.81-3.82-3.81c-9.49-9.49-22.74-12.97-34.99-10.44-6.531-6.936-14.792-12.976-25.21-21.33v-18.51l5.07 3.48c5.03 3.46 11.56 3.51 16.64.15l29.49-19.51c6.828-4.52 8.746-13.744 4.2-20.63-4.541-6.863-13.76-8.732-20.63-4.2l-21.11 13.97c-.007-.005-20.224-13.894-20.23-13.9-3.56-2.4-7.98-3.14-12.14-2.04l-45.09 11.96c-8.498 2.255-13.245 11.401-10.11 19.67l10.44 27.51c2.91 7.67 11.51 11.55 19.2 8.64 7.67-2.91 11.55-11.53 8.64-19.2l-4.58-12.07 10.43-2.77v30.94c-1.45 2.81-2.74 5.34-3.92 7.64-10.74 21.07-10.74 21.07-36.52 34.44-4.32 2.23-9.21 4.77-14.98 7.83-7.25 3.84-10.03 12.87-6.18 20.12 3.84 7.25 12.86 10.03 20.12 6.19 4.9-2.6 9.28-4.89 13.21-6.94 30.39-15.86 35.01-18.27 47.97-42.65 4.898 3.898 8.021 6.393 10.44 8.55-9.21 14.83-7.38 34.61 5.47 47.47l51.3 51.29c3.816 3.816 9.965 3.815 13.78 0l51.29-51.29c15.025-15.025 15.024-39.346 0-54.37zm-131.05-10.93c-1.916-1.544-4.873-1.018-6.06 1.27-13.62 26.23-15.5 27.21-46.84 43.57-3.95 2.06-8.34 4.35-13.25 6.96-3.36 1.77-7.54.49-9.31-2.87-1.78-3.35-.5-7.53 2.86-9.3 5.74-3.05 10.61-5.57 14.91-7.8 27.54-14.28 28.28-14.99 39.97-37.9 1.28-2.52 2.71-5.32 4.34-8.46.3-.57.45-1.2.45-1.84v-37.12c0-2.637-2.504-4.541-5.02-3.87l-19.75 5.24c-2.321.612-3.544 3.107-2.72 5.29l6.16 16.21c1.34 3.56-.45 7.54-4 8.89-3.56 1.34-7.54-.45-8.88-4l-10.44-27.51c-1.425-3.747.66-8.027 4.68-9.1l45.09-11.96c1.91-.51 4.02-.14 5.65.97.138.092 22.223 15.266 22.36 15.36 1.34.92 3.11.94 4.47.04l23.37-15.46c3.189-2.105 7.446-1.211 9.54 1.95 2.087 3.161 1.239 7.441-1.94 9.54l-29.49 19.51c-2.35 1.55-5.37 1.53-7.7-.07l-11.34-7.79c-2.623-1.806-6.26.062-6.26 3.3v28.03c0 1.21.55 2.35 1.49 3.11 9.174 7.431 17.234 13.347 23.25 19.09-4.469 2.082-8.448 5.029-11.46 8.21-3.783-3.292-9.229-7.522-14.13-11.49zm125.4 59.64-51.3 51.3c-.679.679-1.781.679-2.46 0l-51.3-51.3c-11.816-11.816-11.747-30.823-.51-42.51 10.234-11.519 30.693-13.417 43.57-.54l6.64 6.64c1.56 1.56 4.1 1.56 5.66 0l6.64-6.64c11.867-11.867 31.118-11.941 43.06 0 11.883 11.883 11.899 31.151 0 43.05z"/><path d="m214.403 178.844h-23.27l-5.01-12.28c-1.437-3.514-6.545-3.241-7.57.46l-8.13 29.74-8.97-36.27c-.918-3.672-5.919-4.11-7.5-.75-3.796 8.034-2.127 4.503-7.48 15.83-2.056 0-15.182 0-17.19 0-2.21 0-4 1.8-4 4 0 2.21 1.79 4 4 4h19.72c1.55 0 2.96-.89 3.62-2.29 2.62-5.544 1.787-3.78 3.76-7.96l9.97 40.28c.965 3.973 6.635 4.096 7.74.09l9.08-33.2 1.57 3.86c.62 1.5 2.08 2.49 3.71 2.49h25.95c2.2 0 4-1.79 4-4s-1.8-4-4-4z"/><path d="m221.293 172.124c.09.41.18.83.26 1.25.461 2.232 2.681 3.573 4.72 3.12 2.17-.44 3.56-2.55 3.12-4.71-.09-.49-.2-.97-.31-1.44-.49-2.16-2.64-3.5-4.79-3.01s-3.5 2.64-3 4.79z"/><path d="m222.283 155.164c-6.618-8.333-17.045-10.386-23.74-8.56-5.049 1.31-3.134 8.995 1.99 7.75 1 0 9.225-2.096 15.48 5.79 1.359 1.704 3.87 2.035 5.62.64 1.73-1.37 2.02-3.89.65-5.62z"/></g></g></svg>
                        <span class="quantity">{{$jsonCreated['consultaU']['NEjercios']}}</span>
                        <span class="text text--4 text-center"> Número <br>de ejercicios </span>
                    </div>
                </div>
            </div>
            <!-- Content Row -->
            <!-- Area Chart -->
            <div class="col-lg-8 col-md-4 order-1">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="{{asset('assets/img/icons/unicons/weight.png')}}" height="40" class="mr-4">
                            <h6 class="m-2 font-weight-bold text-primary ml-2">Peso estimado</h6>
                        </div>
                        <div class="dropdown no-arrow">
                            <button class="buttonA" id="btnSemanas">Semanas</button>
                            <button class="buttonA" id="btnMeses">Meses</button>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        @foreach ($jsonCreated['datosUsuario'] as $row)
                        <span class="m-5 font-weight-bold text-primary ml-2">
                            {{$row['PESOUSUARIO']}} kg
                        </span>
                        <br>
                        <span class="m-5 font-weight-bold ml-2">
                        {{ $jsonCreated['fechaFormateada'] }}
                        </span>
                        @endforeach
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
                    <!-- Bar Chart -->
            <div class="col-lg-6 col-md-4 order-0">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/icons/unicons/hot-sale.png') }}" height="40" class="mr-4">
                            <h6 class="m-2 font-weight-bold text-primary">Calorías estimadas</h6>
                        </div>
                        <div class="dropdown no-arrow">
                            <button class="buttonA" id="btnCSemanas">Semanas</button>
                            <button class="buttonA" id="btnCMeses">Meses</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <span class="m-5 font-weight-bold text-primary ml-2">
                        {{$jsonCreated['sumaKcalEjercicio']}} kcal
                        </span>
                        <br>
                        <span class="m-5 font-weight-bold ml-2">
                        {{ $jsonCreated['fechaFormateada'] }}
                        </span>
                        <div class="chart-bar">
                            <canvas id="myBarChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/icons/unicons/life-line.png') }}" height="40" class="mr-4">
                            <h6 class="m-2 font-weight-bold text-primary">Gráfico de IMC y Composición Corporal</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-IMC">
                            {{-- <div class="box-IMC" style="flex: 4; background-color: #b0d3cd;  width: 99.5%;margin-right: .5%;">
                                <span class="span" style="bottom: -40%;left: -45%;">15</span>
                            </div> --}}
                            <div class="box-IMC" style="flex: 10; background-color: #4c6c93;  width: 99.5%;margin-right: .5%;">
                                {{-- <span class="span" style=" bottom: -40%; left: -15%; ">16</span> --}}
                            </div>
                            <div class="box-IMC" style="flex: 26; background-color: #74dd78;  width: 99.5%;margin-right: .5%;">
                                <span class="span" style=" bottom: -50%; left: -15%; ">18.5</span>
                            </div>
                            <div class="box-IMC" style="flex: 20; background-color: #dce683;  width: 99.5%;margin-right: .5%;">
                                <span class="span"  style=" bottom: -50%; left: -15%; ">25</span>
                            </div>
                            <div class="box-IMC" style="flex: 20; background-color: #ea4444;  width: 99.5%;margin-right: .5%;">
                                <span class="span" style=" bottom: -50%; left: -15%; ">30</span>
                            </div>
                            {{-- <div class="box-IMC" style="flex: 20; background-color: #ea4444;  width: 99.5%;margin-right: .5%;">
                                <span class="span" style=" bottom: -40%; left: -5%; ">35</span>
                                <span class="span" style=" bottom: -40%; right: -5%; ">40</span>
                            </div> --}}
                            {{-- <div id="line" [style.left.%]="100" style="position: absolute; width: 2.5px; height: 120%; background-color: #ffffff; top: -10%; border-radius: 5px;"></div> --}}
                        </div>
                        <div class="row">
                            <div class="col-lg-6 order-0">
                                <span class="cuadrito cuadrito-azul"></span><label>Bajo peso</label><br>
                                <span class="cuadrito cuadrito-verde"></span><label>Peso saludable</label><br>
                                <span class="cuadrito cuadrito-amarillo"></span><label>Sobrepeso</label><br>
                                <span class="cuadrito cuadrito-rojo"></span><label>Obesidad</label>
                            </div>
                            <div class="col-lg-6 order-1">
                                {{-- <div class="row justify-content-center text-center"> --}}
                                <h6><span class="fw-bold">El IMC del usuario es:</span> <?php echo $IMC; ?></h6>
                                <?php
                                if ($IMC < 18.5) {
                                    echo '<span class="text-danger">Estado: Bajo peso</span>';
                                } elseif ($IMC >= 18.5 && $IMC <= 24.9) {
                                    echo '<span class="text-success">Estado: Peso saludable</span>';
                                } elseif ($IMC >= 25.0 && $IMC <= 29.9) {
                                    echo '<span class="text-warning">Estado: Sobrepeso</span>';
                                } else {
                                    echo '<span class="text-danger">Estado: Obesidad</span>';
                                }
                                ?>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-lg-6 col-md-4 order-0">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/icons/unicons/calendar.png') }}" height="40" class="mr-4">
                            <h6 class="m-2 font-weight-bold text-primary">Tu Actividad Semanal</h6>
                        </div>
                        {{-- <div class="dropdown no-arrow">
                            <button class="buttonA" id="btnCSemanas">Semanas</button>
                            <button class="buttonA" id="btnCMeses">Meses</button>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        @foreach ( $jsonCreated['dataG'] as $item)
                        <div class="d-flex justify-content-between">
                            <span class="small font-weight-bold ml-2">{{$item['fecha']}}</span>
                            <span class="font-weight-bold">{{$item['porcentaje']}}%</span>
                        </div>
                        <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{$item['porcentaje']}}%"
                                    aria-valuenow="{{$item['suma']}}" aria-valuemin="0" aria-valuemax="{{$jsonCreated['supPorcentaje']}}"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- <button id="btnExportar" onclick="exportarTarjetas()">Exportar</button> --}}

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{URL::asset('js/jquery-3.6.1.js')}}"></script>


<script>

    $(document).ready(function() {
        var myChart; // Variable para almacenar la instancia del gráfico

        // Función para obtener y mostrar los datos por semanas
        $('#btnSemanas').click(function() {
            // Agregar clase 'active' al botón seleccionado
            $('#btnSemanas').addClass('active');
            $('#btnMeses').removeClass('active');
            var url = "{{ route('getPesosSemanas', ['idUser' => $idUser]) }}";
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (myChart) {
                        myChart.destroy();
                    }
                    // Aquí debes procesar los datos recibidos y mostrarlos en el Area Chart
                    // Primero, convierte el objeto JSON recibido en dos arreglos separados para las fechas y los pesos
                    var fechas = Object.keys(data);
                    var pesos = Object.values(data);

                    // Crea el Area Chart utilizando Chart.js
                    var ctx = document.getElementById("myAreaChart");
                    myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: fechas, // Utiliza el arreglo de fechas como las etiquetas del eje X
                            datasets: [{
                                label: "Peso (kg)",
                                lineTension: 0.3,
                                backgroundColor: "rgba(118, 36, 194, 0.05)",
                                borderColor: "rgb(118, 36, 194)",
                                pointRadius: 3,
                                pointBackgroundColor: "rgb(118, 36, 194)",
                                pointBorderColor: "rgb(118, 36, 194)",
                                pointHoverRadius: 3,
                                pointHoverBackgroundColor: "rgb(118, 36, 194)",
                                pointHoverBorderColor: "rgb(118, 36, 194)",
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                                data: pesos, // Utiliza el arreglo de pesos como los datos del gráfico
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 25,
                                    top: 15,
                                    bottom: 0
                                }
                            },
                        },
                    });
                }
            });
        });

        // Función para obtener y mostrar los datos por meses
        $('#btnMeses').click(function() {
            // Agregar clase 'active' al botón seleccionado
            $('#btnMeses').addClass('active');
            $('#btnSemanas').removeClass('active');

            var url = "{{ route('getPesosMeses', ['idUser' => $idUser]) }}";
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (myChart) {
                        myChart.destroy();
                    }
                    // Aquí debes procesar los datos recibidos y mostrarlos en el Area Chart
                    // Primero, convierte el objeto JSON recibido en dos arreglos separados para las fechas y los pesos
                    var meses = Object.keys(data);
                    var pesos = Object.values(data);

                    // Crea el Area Chart utilizando Chart.js
                    var ctx = document.getElementById("myAreaChart");
                    myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                            datasets: [{
                                label: "Peso (kg)",
                                lineTension: 0.3,
                                backgroundColor: "rgba(118, 36, 194, 0.05)",
                                borderColor: "rgb(118, 36, 194)",
                                pointRadius: 3,
                                pointBackgroundColor: "rgb(118, 36, 194)",
                                pointBorderColor: "rgb(118, 36, 194)",
                                pointHoverRadius: 3,
                                pointHoverBackgroundColor: "rgb(118, 36, 194)",
                                pointHoverBorderColor: "rgb(118, 36, 194)",
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                                data: pesos, // Utiliza el arreglo de pesos como los datos del gráfico
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 25,
                                    top: 25,
                                    bottom: 0
                                }
                            },

                        },
                    });
                }
            });
        });

        // Función para obtener y mostrar CALORIAS por semanas
        $('#btnCSemanas').click(function() {
            // Agregar clase 'active' al botón seleccionado
            $('#btnCSemanas').addClass('active');
            $('#btnCMeses').removeClass('active');

            var url = "{{ route('getCaloriasSemanas', ['idUser' => $idUser]) }}";
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (myChart) {
                        myChart.destroy();
                    }

                    // Aquí debes procesar los datos recibidos y mostrarlos en el Bar Chart
                    // Primero, convierte el objeto JSON recibido en dos arreglos separados para las fechas y las calorías
                    var fechas = Object.keys(data);
                    var calorias = Object.values(data);

                    // Crea el Bar Chart utilizando Chart.js
                    var ctx = document.getElementById("myBarChart");
                    myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: fechas, // Utiliza el arreglo de fechas como las etiquetas del eje X
                            datasets: [{
                                label: "Calorías",
                                backgroundColor: "rgba(118, 36, 194, 0.5)",
                                borderColor: "rgb(118, 36, 194)",
                                borderWidth: 1,
                                data: calorias, // Utiliza el arreglo de calorías como los datos del gráfico
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 25,
                                    top: 15,
                                    bottom: 0
                                }
                            },
                        },
                    });
                }
            });
        });

        // Función para obtener y mostrar CALORIAS por semanas
        $('#btnCMeses').click(function() {
            // Agregar clase 'active' al botón seleccionado
            $('#btnCMeses').addClass('active');
            $('#btnCSemanas').removeClass('active');

            var url = "{{ route('getCaloriasMeses', ['idUser' => $idUser]) }}";
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (myChart) {
                        myChart.destroy();
                    }

                    // Aquí debes procesar los datos recibidos y mostrarlos en el Bar Chart
                    // Primero, convierte el objeto JSON recibido en dos arreglos separados para las fechas y las calorías
                    var fechas = Object.keys(data);
                    var calorias = Object.values(data);

                    // Crea el Bar Chart utilizando Chart.js
                    var ctx = document.getElementById("myBarChart");
                    myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                        labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                            datasets: [{
                                label: "Calorías",
                                backgroundColor: "rgba(118, 36, 194, 0.5)",
                                borderColor: "rgb(118, 36, 194)",
                                borderWidth: 1,
                                data: calorias, // Utiliza el arreglo de calorías como los datos del gráfico
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 25,
                                    top: 15,
                                    bottom: 0
                                }
                            },
                        },
                    });
                }
            });
        });
    });

    // function exportarExcel(datos, nombreHoja, nombreArchivo) {
    //     const workbook = XLSX.utils.book_new();
    //     const worksheet = XLSX.utils.aoa_to_sheet([["Título", "Descripción", "Enlace"]]);

    //     datos.forEach(dato => {
    //         const fila = [dato.titulo, dato.descripcion, dato.enlace];
    //         XLSX.utils.sheet_add_aoa(worksheet, [fila], { origin: -1 });
    //     });

    //     XLSX.utils.book_append_sheet(workbook, worksheet, nombreHoja);

    //     const excelBuffer = XLSX.write(workbook, { bookType: "xlsx", type: "array" });
    //     const blob = new Blob([excelBuffer], { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" });

    //     if (navigator.msSaveBlob) {
    //         navigator.msSaveBlob(blob, nombreArchivo);
    //     } else {
    //         const link = document.createElement("a");
    //         link.href = window.URL.createObjectURL(blob);
    //         link.download = nombreArchivo;
    //         link.click();
    //     }
    // }

    // function exportarTarjetas() {
    //     let tarjetasExport = document.querySelectorAll(".cardG-export");
    //     let datos = [];

    //     tarjetasExport.forEach(tarjeta => {
    //         const nombreCompleto = tarjeta.querySelector(".name").textContent;
    //         const edad = tarjeta.querySelector(".state-value").textContent;

    //         const pesos = [];
    //         const alturas = [];

    //         const pesoElements = tarjeta.querySelectorAll(".state-value.peso");
    //         pesoElements.forEach(pesoElement => {
    //             pesos.push(pesoElement.textContent);
    //         });

    //         const alturaElements = tarjeta.querySelectorAll(".state-value.altura");
    //         alturaElements.forEach(alturaElement => {
    //             alturas.push(alturaElement.textContent);
    //         });

    //         datos.push({ nombreCompleto, edad, pesos, alturas });
    //     });

    //     if (datos.length > 0) {
    //         exportarExcel(datos, "Tarjetas", "Tarjetas_exportadas.xlsx");
    //     } else {
    //         console.error("No se encontraron elementos de tarjeta válidos para exportar.");
    //     }
    // }


</script>

@endsection

