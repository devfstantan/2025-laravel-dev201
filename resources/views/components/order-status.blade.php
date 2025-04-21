@props(['value'])
@if ($value == 'new')
    <span style="color:blueviolet">Nouvelle</span>
@elseif($value == 'in_progress')
    <span style="color:orange">En cours</span>
@else
    <span style="color:green">Terminée</span>
@endif
