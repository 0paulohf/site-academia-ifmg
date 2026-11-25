
from django.db import models
from django.contrib.auth.models import AbstractUser


class Usuario(AbstractUser):
    numero_identificacao = models.CharField(
        max_length=50,
        unique=True
    )

    PERFIS = [
        ('aluno', 'Aluno'),
        ('instrutor', 'Instrutor'),
        ('administrador', 'Administrador'),
    ]

    perfil = models.CharField(
        max_length=20,
        choices=PERFIS
    )
