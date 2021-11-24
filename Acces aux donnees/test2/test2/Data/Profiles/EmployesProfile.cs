using AutoMapper;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using test2.Data.Dtos;
using test2.Data.Models;

namespace test2.Data.Profiles
{
    public class EmployesProfile : Profile
    {
        public EmployesProfile()
        {
            CreateMap<Employe, EmployeDto>();
            CreateMap<EmployeDto, Employe>();
        }
    }
}
