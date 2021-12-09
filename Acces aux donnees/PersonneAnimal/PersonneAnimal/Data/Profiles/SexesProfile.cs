using AutoMapper;
using PersonneAnimal.Data.Dtos;
using PersonneAnimal.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace PersonneAnimal.Data.Profiles
{
    public class SexesProfile:Profile
    {
        public SexesProfile()
        {
            CreateMap<SexeDTOin, Sexe>();
            CreateMap<Sexe, SexeDTOin>();
            CreateMap<Sexe, SexeDTOout>();
        }
    }
}
