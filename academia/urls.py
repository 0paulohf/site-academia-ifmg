from django.urls import path
from . import views


urlpatterns = [
    path(
        'cadastrar-aluno/',
        views.cadastrar_aluno,
        name='cadastrar_aluno'
    ),
]
