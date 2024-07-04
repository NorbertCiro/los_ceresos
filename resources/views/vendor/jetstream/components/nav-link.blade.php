@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2  text-sm font-medium leading-5 text-gray-900 focus:outline-none  transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2  text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700  transition  focus:border-gray-900 ';
@endphp

<style>
    #x{
        background-color: transparent !important;
    }
    

    #linkk{
       color: white;
       
       
    }

    #linkk:hover{
       color:rgb(74, 224, 127) ; 
       border-bottom:solid rgb(74, 224, 127); 
    }

    #linkk:active{
    
        border-bottom:solid rgb(74, 224, 127); 
        color:white;
    }

   
    
            
    </style>

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
