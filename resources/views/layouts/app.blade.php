<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Fontawesome -->
        <link
          rel="stylesheet"
          href="{{ASSETS_BACKEND}}vendor/@fortawesome/fontawesome-free/css/all.min.css"
        />

        <!-- Flag Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


        <!--Start: Regular Datatables CSS-->
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <!--Responsive Extension Datatables CSS-->
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

        <style>
            /*Overrides for Tailwind CSS */
                
                /*Form fields*/
                .dataTables_wrapper select,
                .dataTables_wrapper .dataTables_filter input {
                    color: #4a5568;             /*text-gray-700*/
                    padding-left: 1rem;         /*pl-4*/
                    padding-right: 1rem;        /*pl-4*/
                    padding-top: .5rem;         /*pl-2*/
                    padding-bottom: .5rem;      /*pl-2*/
                    line-height: 1.25;          /*leading-tight*/
                    border-width: 2px;          /*border-2*/
                    border-radius: .25rem;      
                    border-color: #edf2f7;      /*border-gray-200*/
                    background-color: #edf2f7;  /*bg-gray-200*/
                    border: 1px solid black;
                }

                /*Row Hover*/
                table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
                    background-color: #ebf4ff;  /*bg-indigo-100*/
                }
                
                /*Pagination Buttons*/
                .dataTables_wrapper .dataTables_paginate .paginate_button       {
                    font-weight: 700;               /*font-bold*/
                    border-radius: .25rem;          /*rounded*/
                    border: 1px solid transparent;  /*border border-transparent*/
                }
                
                /*Pagination Buttons - Current selected */
                .dataTables_wrapper .dataTables_paginate .paginate_button.current   {
                    color: #fff !important;             /*text-white*/
                    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);    /*shadow*/
                    font-weight: 700;                   /*font-bold*/
                    border-radius: .25rem;              /*rounded*/
                    background: #667eea !important;     /*bg-indigo-500*/
                    border: 1px solid transparent;      /*border border-transparent*/
                }

                /*Pagination Buttons - Hover */
                .dataTables_wrapper .dataTables_paginate .paginate_button:hover     {
                    color: #fff !important;             /*text-white*/
                    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);     /*shadow*/
                    font-weight: 700;                   /*font-bold*/
                    border-radius: .25rem;              /*rounded*/
                    background: #667eea !important;     /*bg-indigo-500*/
                    border: 1px solid transparent;      /*border border-transparent*/
                }
                
                /*Add padding to bottom border */
                table.dataTable.no-footer {
                    border-bottom: 1px solid #e2e8f0;   /*border-b-1 border-gray-300*/
                    margin-top: 0.75em;
                    margin-bottom: 0.75em;
                }
                
                /*Change colour of responsive icon*/
                table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
                    background-color: #667eea !important; /*bg-indigo-500*/
                }
        </style>
        <!--End: Regular Datatables CSS-->


        <!-- Alpine js -->

        {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}

        {{-- jquery  --}}
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!-- Sweet Alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/custom.js') }}" defer></script>


        <!-- Start: Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function() {
                
                var table = $('#example').DataTable( {
                        responsive: true
                    } )
                    .columns.adjust()
                    .responsive.recalc();
            } );

        </script>
        <!-- End: Datatables -->
        

    </head>

    <body class="font-sans antialiased p-1">
        <div class="min-h-screen bg-gray-100">
            @include('backend.includes.loader')
            @include('layouts.navigation')  {{-- layouts/navigation --}}

            <!-- Page Heading -->
           {{-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

    </body>

    <!-- Start: Sweet Alert For Delete -->
        
    <!-- End: Sweet Alert For Delete -->
    
</html>
