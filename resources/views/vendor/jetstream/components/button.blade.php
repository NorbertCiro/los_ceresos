<style>
    button#bt{
        background-color: rgb(74, 224, 127);
        color: white;
        width: 105px;
        height: 30px;
        border-radius: 0.2rem;
        margin: 2px;
        font-family: Thin italic;
        font-size: 15px;
        letter-spacing: 1px;
        
    }

    button#bt:hover{
        background-color: white;
        border:solid 1px rgb(74, 224, 127);
        color: rgb(74, 224, 127);
    }

 

</style>


<button id="bt"{{ $attributes->merge(['type' => 'submit', 'class' => '']) }}>
    {{ $slot }}
</button>


