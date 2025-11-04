<x-layout>
    <ul>
        @foreach ($competitions as $comp)
            <li>
                <span>
                    {{ $comp->name }}
                </span>
                <button onclick="">Szerkesztés</button>
            </li>
        @endforeach
    </ul>
    <button onclick="">Létrehozás</button>
    <div class="modal">
        <form onsubmit="" class="competition-form disabled">
            <div class="input-container">
                <label for="name">Verseny neve:</label>
                <input
                    type="text"
                    name="name"
                    required
                >
            </div>
            <div class="input-container">
                <label for="year">Verseny éve:</label>
                <input
                    type="number"
                    name="year"
                    required
                >
            </div>
            <div class="input-container">
                <label for="pfg">Pont helyes válaszért:</label>
                <input 
                    type="number"
                    name="pfg"
                    required
                >
            </div>
            <div class="input-container">
                <label for="pfb">Pont rossz válaszért:</label>
                <input 
                    type="number"
                    name="pfb"
                    required
                >
            </div>
            <div class="input-container">
                <label for="pfn">Pont üres válaszért:</label>
                <input 
                    type="number"
                    name="pfn"
                    required
                >
            </div>
            <button>Mentés</button>
        </form>
    </div>
</x-layout>