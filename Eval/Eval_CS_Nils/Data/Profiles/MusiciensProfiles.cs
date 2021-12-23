using AutoMapper;
using ECF.Data.Dtos;
using ECF.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ECF.Data.Profiles
{
    class MusiciensProfiles : Profile
    {
        public MusiciensProfiles()
        {
            CreateMap<MusiciensDTOIn, Musicien>();
            CreateMap<Musicien, MusiciensDTOOut>();// au final, on utilise pas le MusiciensDTOOut..tristesse.
            CreateMap<Musicien, MusiciensDTOOutAvecGroupe>()
                .ForMember(destination=>destination.NomDuGroupe,option=>option.MapFrom(source=>source.Groupe.NomDuGroupe));//on applati tous ça pour gratter un point bonus quand martine vera que du coup le nom du groupe s'affiche dans la grille des musiciens.
        }
    }
}
