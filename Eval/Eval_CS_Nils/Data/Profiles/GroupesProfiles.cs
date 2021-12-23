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
    class GroupesProfiles : Profile
    {
        public GroupesProfiles()
        {
            CreateMap<GroupesDTOIn, Groupe>();
            CreateMap<Groupe,GroupesDTOOut>();
            CreateMap<Groupe, GroupesDTOOutAvecMusiciens>();//au final, on utilise pas le GroupesDTOOutAvecMusiciens.. tristesse.
        }
    }
}
