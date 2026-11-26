from django.contrib.auth.decorators import login_required
from django.core.exceptions import PermissionDenied
from django.shortcuts import render, redirect
from .forms import CadastroAlunoForm


@login_required
def cadastrar_aluno(request):
    if request.user.perfil != 'instrutor':
        raise PermissionDenied

    if request.method == 'POST':
        form = CadastroAlunoForm(request.POST)

        if form.is_valid():
            form.save()
            return redirect('cadastrar_aluno')
    else:
        form = CadastroAlunoForm()

    return render(request, 'academia/cadastrar_aluno.html', {
        'form': form
    })
