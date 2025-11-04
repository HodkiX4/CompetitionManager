<x-layout>
    <form action="" method="POST">
        @csrf
        <h3>Hozz létre egy versenyt</h3>

        <label for="name">Név:</label>
        <input
            type="text"
            name="name"
            required
        >

        <label for="year">Év:</label>
        <input
            type="text"
            name="year"
            required
        >

        <label for="available_languages">Elérhető nyelvek:</label>
        <textarea
            type="text"
            name="available_languages"
            required
        >

        <label for="pfc">Pontok jó válaszért:</label>
        <input
            type="number"
            name="pfc"
            required
        >

        <label for="pfw">Pontok rossz válaszért:</label>
        <input
            type="number"
            name="pfw"
            required
        >

        <label for="pfn">Pontok üres válaszért:</label>
        <input
            type="number"
            name="pfn"
            required
        >
        
        <button type="submit">Regisztráció</button>
    </form>
</x-layout>