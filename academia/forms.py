from django import forms
from django.contrib.auth.forms import UserCreationForm
from .models import Usuario


class CadastroAlunoForm(UserCreationForm):
    class Meta:
        model = Usuario
        fields = (
            'identificador',
            'first_name',
            'last_name',
            'email',
        )

    def save(self, commit=True):
        usuario = super().save(commit=False)
        usuario.perfil = 'aluno'

        if commit:
            usuario.save()

        return usuario
