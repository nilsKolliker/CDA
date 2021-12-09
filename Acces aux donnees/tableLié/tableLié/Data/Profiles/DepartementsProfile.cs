using AutoMapper;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using tableLié.Data.Dtos;
using tableLié.Data.Models;

namespace tableLié.Data.Profiles
{
    public class DepartementsProfile : Profile
    {
        public DepartementsProfile()
        {
            CreateMap<Departement, DepartementsDTOout>();
            CreateMap<Departement, DepartementsDTO>();
            CreateMap<DepartementsDTO, Departement>();
        }
    }
}
