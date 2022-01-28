using AutoMapper;
using crudTextCsharp.Data.Models;
using crudTextCsharp.Dtos.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace crudTextCsharp.Data.Profiles
{
    public class UtilisateursProfile : Profile
    {
        public UtilisateursProfile()
        {
            CreateMap<Utilisateur, UtilisateurDTO>();
            CreateMap<UtilisateurDTO, Utilisateur > ();
        }
    }
}