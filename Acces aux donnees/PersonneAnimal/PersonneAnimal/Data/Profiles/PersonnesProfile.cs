using AutoMapper;
using PersonneAnimal.Data.Dtos;
using PersonneAnimal.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace PersonneAnimal.Data.Profiles
{
    public class PersonnesProfile:Profile
    {
        public PersonnesProfile()
        {
            CreateMap<PersonneDTOin, Personne>();
            CreateMap<Personne, PersonneDTOout>();
            CreateMap<Personne, PersonneDTOsimple>();
        }
    }
}
