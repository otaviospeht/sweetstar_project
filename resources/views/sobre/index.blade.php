@extends('layouts.default')

@push('page-css')
    <style type="text/css">
        .about-title {
            font-size: 2rem;
        }
    </style>
@endpush

@section('content')
    <div class="card-box">
        <div class="row">
            <div class="col-12">
                <h4 class="text-primary">Sobre a SweetStar</h4>
                <hr>
            </div>
            <div class="col-12 col-md-8">
                <p>
                    A SweetStar é uma empresa que tem escritórios de armazenagem localizados em São Paulo - Capital, especializada na importação e comércio de produtos de diversos seguimentos, principalmente de doces importados, que aposta na alta qualidade para atender as exigências do mercado. A SweetStar trabalha com os produtos das melhores marcas estrangeiras. As nossas importações quinzenais permitem a manutenção da qualidade dos produtos, bem como a preservação das características originais dos mesmos. A atenção as características de cada produto importado, armazenamento e embalagem são outros fatores diferenciais na atuação da SweetStar. A empresa conta com uma equipe altamente capacitada que está sempre pronta para atendê-los.
                </p>
            </div>
            <div class="col-md-2 offset-md-1 d-none d-md-block">
                <img src="{{ url('img/logo.png') }}" style="max-width: 100%">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-4 mb-4">
            <div class="card-box text-center h-100">
                <div class="about-title text-uppercase text-primary">
                    <i class="mdi mdi-eye"></i>
                    Visão
                </div>
                <hr>
                <p>
                    Proporcionar produtos e serviços de qualidade, inovação e excelência com um ambiente próspero e parcerias sustentáveis.
                </p>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-4">
            <div class="card-box text-center h-100">
                <div class="about-title text-uppercase text-primary">
                    <i class="mdi mdi-target"></i>
                    Missão
                </div>
                <hr>
                <p>
                    Ser uma marca global, reconhecida como referência em surpreender e encantar os clientes, consumidores, colaboradores e parceiros.
                </p>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-4">
            <div class="card-box text-center h-100">
                <div class="about-title text-uppercase text-primary">
                    <i class="mdi mdi-diamond"></i>
                    Valores
                </div>
                <hr>
                <p>
                    Priorizamos o negócio e temos objetivos claros de nossos papéis. Zelamos pela nossa imagem e cuidamos de todos que possuem relação com o nosso negócio, direcionando a nossa atenção para as demandas que mais impactam o negócio.
                </p>
            </div>
        </div>
    </div>
@endsection