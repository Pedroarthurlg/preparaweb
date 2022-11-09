<div>
    <form action="POST" wire:submit.prevent='store'>
        <div>
            @error('materia') <p>{{$message}}</p> @enderror
            @error('valor') <p>{{$message}}</p> @enderror
            @error('curso') <p>{{$message}}</p> @enderror
        </div>
        <div>
            <label>Matéria: </label>
            <input type="text" name="materia" wire:model="materia" required>
        </div>
        <div>
            <label>Valor: </label>
            <input type="number" step="0.01" name="valoe" wire:model="valor" required>
        </div>
        <div>
            <label>Curso: </label>
            <select name="curso" wire:model="curso" required>
                <option value=""></option>
                <option value="Informática">Informática</option>
                <option value="Edificações">Edificações</option>
                <option value="Mecatrônica">Mecatrônica</option>
                <option value="Sistemas de Informação">Sistemas de Informação</option>
                <option value="Engenharia Civil">Engenharia Civil</option>
            </select>
        </div><br>
        <div>
            <button type="submit">Enviar</button>
            <button type="button" wire:click="limpar()">Limpar</button>
        </div><br>
        <input type="hidden" name="editid">
    </form>

    <div>
        <table border="1">
            <tr>
                <th>Matéria</th>
                <th>Valor</th>
                <th>Curso</th>
                <th>Editar</th>
                <th>Remover</th>
            </tr>
            <tbody>
                @foreach($provas as $prova)
                <tr>
                    <td>{{$prova->materia}}</td>
                    <td>{{$prova->valor}}</td>
                    <td>{{$prova->curso}}</td>
                    <td>
                        <Button type="button" wire:click="editar({{$prova->id}})"></Button>
                    </td>
                    <td>
                        <Button type="button" wire:click="remover({{$prova->id}})"></Button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
