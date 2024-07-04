<style>
    button#bd{
        background-color: #191919;
        color: white;
        width: 105px;
        height: 30px;
        border-radius: 0.2rem;
        margin: 2px;
        font-family: Thin italic;
        font-size: 15px;
        letter-spacing: 1px;
        font-family: Thin italic;
        font-size: 15px;
        letter-spacing: 1px;
    }

    button#bd:hover{
        background-color: white;
        border:solid 1px rgba(0, 0, 0, 0.616);
        color: #191919;

    }


</style>

<button id="bd" {{ $attributes->merge(['type' => 'submit', 'class' => '']) }}>
    {{ $slot }}
</button>
