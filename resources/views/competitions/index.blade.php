<x-layout>
    @if ($competitions === null || $competitions->isEmpty())
        <div id="no-comp-container">
            <h1>Nincs még verseny felvéve.</h1>
        </div>
    @else
        <ul id="competition-list">
            @foreach ($competitions as $comp)
            <li id={{ $comp->id }}>
                <div class="content">
                    <span>
                        Verseny: <strong>{{ $comp->name }}</strong>
                    </span>
                    <span>
                        Év: <strong>{{ $comp->year }}</strong>
                    </span>
                    <span>
                        Elérhető nyelvek: <strong>{{ $comp->available_languages }}</strong>
                    </span>
                    <span>
                        Pont jó válaszért: <strong>{{ $comp->point_for_good_answer }}</strong>
                    </span>
                    <span>
                        Pont rossz válaszért: <strong>{{ $comp->point_for_bad_answer }}</strong> 
                    </span>
                    <span>
                        Pont üres válaszért: <strong>{{ $comp->point_for_no_answer }}</strong>
                    </span>
                </div>
                <div class="actions">
                    <button class="add-round-btn" onclick="addRoundModal({{ $comp }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    </button>
                    <button class="edit-btn" onclick="addEditModal({{ $comp }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-icon lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                    </button>
                    <button class="delete-btn" onclick="removeCompetition(event, {{ $comp->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-icon lucide-trash"><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                    </button>
                </div>
            </li>
            @endforeach
        </ul>
    @endif
</x-layout>